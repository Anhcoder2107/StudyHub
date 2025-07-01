<template>
    <layout-authen>
        <div v-if="showToast && can('Create category course')" id="toast-success"
            class="fixed top-6 right-6 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800 z-50"
            role="alert">
            <div
                class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">Category created successfully.</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                @click="showToast = false" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        <div v-if="can('Browse category course')" class="container mx-auto px-4 py-6">
            <div class="flex justify-end mb-4">
                <Link :href="route('category-courses.create')"
                    class="px-6 py-3 bg-emerald-500 text-white rounded shadow hover:bg-emerald-600 transition duration-200">
                    Create Category
                </Link>
            </div>
            <div v-if="loading" class="text-center py-6">
                <span class="text-blueGray-600 text-lg">Loading categories...</span>
            </div>
            <div v-else-if="error" class="text-center py-6 text-sm text-red-600">
                {{ error }}
            </div>
            <card-table v-else :color="tableColor" :title="tableTitle" :name-table="tableHeaders"
                :data-table="categoryData" :show-actions="true" :actions="(row, index) => [
                    { label: 'Edit', action: () => handleEdit(row) },
                    { label: 'Delete', action: () => handleDelete(row) },
                ]" />
        </div>
        <div v-if="pagination && pagination.last_page > 1 && can('Browse Category Course')" class="flex justify-center mt-6 space-x-2">
            <button class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300" :disabled="pagination.current_page === 1"
                @click="changePage(pagination.current_page - 1)">
                Prev
            </button>
            <button v-for="page in pagination.last_page" :key="page" class="px-3 py-1 rounded"
                :class="pagination.current_page === page ? 'bg-emerald-500 text-white' : 'bg-gray-200 hover:bg-gray-300'"
                @click="changePage(page)">
                {{ page }}
            </button>
            <button class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300"
                :disabled="pagination.current_page === pagination.last_page"
                @click="changePage(pagination.current_page + 1)">
                Next
            </button>
        </div>
    </layout-authen>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import { ref, computed, onMounted } from 'vue';
import axios from 'axios';
import LayoutAuthen from "@/Layouts/admin/AuthenticatedLayout.vue";
import CardTable from "@/Components/admin/components/Cards/CardTable.vue";
import { is, can } from 'laravel-permission-to-vuejs';

export default {
    name: 'CategoryCourseIndex',
    components: {
        LayoutAuthen,
        CardTable,
        Link
    },
    methods: {
        handleEdit(row) {
            window.location.href = `/admin/category-courses/${row.id}/edit`;
        }

    },
    setup() {
        const tableColor = ref('light');
        const tableTitle = ref('Category Management');
        const tableHeaders = [ 'id', 'category_name', 'category_description', 'created_at', 'updated_at'];
        const categories = ref([]);
        const loading = ref(true);
        const error = ref(null);
        const pagination = ref(null);
        const currentPage = ref(1);
        const showToast = ref(false);

        const fetchCategories = async (page = 1) => {
            loading.value = true;
            error.value = null;
            try {
                const response = await axios.get(`http://localhost:8000/api/category-courses?page=${page}`);
                categories.value = response.data.data;
                pagination.value = {
                    current_page: response.data.current_page,
                    last_page: response.data.last_page,
                    per_page: response.data.per_page,
                    total: response.data.total,
                };
                currentPage.value = response.data.current_page;
            } catch (err) {
                error.value = 'Failed to load categories. Please try again later.';
                console.error('Error fetching categories:', err);
            } finally {
                loading.value = false;
            }
        };

        const categoryData = computed(() => {
            return categories.value.map(category => ({
                ...category,
                // status: 'completed',
            }));
        });

        const changePage = (page) => {
            if (page !== currentPage.value && page >= 1 && page <= pagination.value.last_page) {
                fetchCategories(page);
            }
        };

        const handleDelete = async (row) => {
            if (confirm(`Are you sure you want to delete category ${row.category_name}?`)) {
                try {
                    await axios.delete(`http://localhost:8000/api/category-courses/${row.id}`);
                    localStorage.setItem('category_deleted', '1');
                    fetchCategories(currentPage.value);
                } catch (err) {
                    error.value = 'Failed to delete category. Please try again.';
                    console.error('Error deleting category:', err);
                }
            }
        };

        onMounted(() => {
            fetchCategories();
            if (localStorage.getItem('category_created') === '1') {
                showToast.value = true;
                setTimeout(() => { showToast.value = false; }, 3000);
                localStorage.removeItem('category_created');
            }
        });

        return {
            tableColor,
            tableTitle,
            tableHeaders,
            categoryData,
            loading,
            error,
            changePage,
            pagination,
            showToast,
            can,
            handleDelete,
        };
    },
};
</script>
