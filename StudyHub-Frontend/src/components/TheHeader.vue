<script>


export default {
    data() {
        return {
            // role: this.$route.fullPath.split('/')[1]
        }
    }
}

</script>



<template>
    <div class="header svelte-1dkrp89" id="header">
        <div class="header__container svelte-1dkrp89">
            <div class="header__logo svelte-1dkrp89">
                <div class="site-logo site-logo--header site-logo--cg-light svelte-v7sjyd"></div>
            </div>
            <div class="header__page-nav svelte-1dkrp89">
                <ul class="page-nav svelte-4c4ixe">
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#about">About the course</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#features">Features</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#training-format">Training format</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#reviews">Reviews</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#media"></a> </li>
                </ul>
                <nav>
                <ul class="list-inline">
                    <li>
                        <router-link :to="{ name: 'home' }">Home</router-link>
                    </li>
                    <li v-if="!$auth.check()" class="pull-right">
                        <router-link :to="{ name: 'login' }">Login</router-link>
                    </li>
                    <li v-if="!$auth.check()" class="pull-right">
                        <router-link :to="{ name: 'register' }">Register</router-link>
                    </li>
                    <li v-if="$auth.check()" class="pull-right">
                        <a href="#" @click.prevent="$auth.logout()">Logout</a>
                    </li>
                </ul>
            </nav>
            </div>
            <div class="header__start svelte-1dkrp89">
                <div class="header__start-m svelte-1dkrp89"><a
                        class="btn btn--hero btn--sm btn--label-size-l svelte-1lciy85  btn--uppercase btn--spacing"
                        rel="external" role="link" tabindex="0" href="/welcome" target="_blank"><span
                            class="btn__label svelte-1lciy85">Start</span> </a></div>
                <div class="header__start-d svelte-1dkrp89"><a
                        class="btn btn--hero btn--sm btn--label-size-l svelte-1lciy85" rel="external" role="link"
                        tabindex="0" href="/welcome" target="_blank"><span class="btn__label svelte-1lciy85">Start
                            Learning</span> </a></div>
            </div> <button class="mobile-panel-btn svelte-1dkrp89"><svg
                    class="icon icon--mobile-panel-open svelte-ygx28l" aria-hidden="true">
                    <use xlink:href="#icon-mobile-panel-open"></use>
                </svg></button>
        </div>
    </div>
    <!-- <div v-else-if="role == 'teacher'" class="header svelte-1dkrp89" id="header">
        <div class="header__container svelte-1dkrp89">
            <div class="header__logo svelte-1dkrp89">
                <div class="site-logo site-logo--header site-logo--cg-light svelte-v7sjyd"></div>
            </div>
            <div class="header__page-nav svelte-1dkrp89">
                <ul class="page-nav svelte-4c4ixe">
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#about">{{  }}</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#features">Features</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#training-format">Training format</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#reviews">Reviews</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#media">{{ $route.fullPath }}</a> </li>
                </ul>
            </div>
            <div class="header__start svelte-1dkrp89">
                <div class="header__start-m svelte-1dkrp89"><a
                        class="btn btn--hero btn--sm btn--label-size-l svelte-1lciy85  btn--uppercase btn--spacing"
                        rel="external" role="link" tabindex="0" href="/welcome" target="_blank"><span
                            class="btn__label svelte-1lciy85">Start</span> </a></div>
                <div class="header__start-d svelte-1dkrp89"><a
                        class="btn btn--hero btn--sm btn--label-size-l svelte-1lciy85" rel="external" role="link"
                        tabindex="0" href="/welcome" target="_blank"><span class="btn__label svelte-1lciy85">Start
                            Learning</span> </a></div>
            </div> <button class="mobile-panel-btn svelte-1dkrp89"><svg
                    class="icon icon--mobile-panel-open svelte-ygx28l" aria-hidden="true">
                    <use xlink:href="#icon-mobile-panel-open"></use>
                </svg></button>
        </div>
    </div>
    <div v-else-if="role == 'student'" class="header svelte-1dkrp89" id="header">
        <div class="header__container svelte-1dkrp89">
            <div class="header__logo svelte-1dkrp89">
                <div class="site-logo site-logo--header site-logo--cg-light svelte-v7sjyd"></div>
            </div>
            <div class="header__page-nav svelte-1dkrp89">
                <ul class="page-nav svelte-4c4ixe">
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#about">{{ role1 }}</a> </li>
                            <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                                href="#about">student</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#features">Features</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#training-format">Training format</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#reviews">Reviews</a> </li>
                    <li class="page-nav__item svelte-4c4ixe"><a class="page-nav__link svelte-4c4ixe" rel="external"
                            href="#media">{{ $route.fullPath }}</a> </li>
                </ul>
            </div>
            <div class="header__start svelte-1dkrp89">
                <div class="header__start-m svelte-1dkrp89"><a
                        class="btn btn--hero btn--sm btn--label-size-l svelte-1lciy85  btn--uppercase btn--spacing"
                        rel="external" role="link" tabindex="0" href="/welcome" target="_blank"><span
                            class="btn__label svelte-1lciy85">Start</span> </a></div>
                <div class="header__start-d svelte-1dkrp89"><a
                        class="btn btn--hero btn--sm btn--label-size-l svelte-1lciy85" rel="external" role="link"
                        tabindex="0" href="/welcome" target="_blank"><span class="btn__label svelte-1lciy85">Start
                            Learning</span> </a></div>
            </div> <button class="mobile-panel-btn svelte-1dkrp89"><svg
                    class="icon icon--mobile-panel-open svelte-ygx28l" aria-hidden="true">
                    <use xlink:href="#icon-mobile-panel-open"></use>
                </svg></button>
        </div>
    </div> -->
    
</template>


