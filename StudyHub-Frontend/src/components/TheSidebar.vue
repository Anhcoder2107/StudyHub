<script setup lang="ts">
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { faRocket } from '@fortawesome/free-solid-svg-icons'
</script>


<template>
    <div class="site-sidebar svelte-1s254qv">
        <nav class="sidebar-nav svelte-1dq4s2d">
            <div class="sidebar-nav__home svelte-1dq4s2d">
                <div class="sidebar-nav__logo-container">
                    <div class="sidebar-nav__logo svelte-1dq4s2d">
                        <div class="site-logo site-logo--header site-logo--cg-light svelte-v7sjyd"></div>
                    </div>
                </div>
            </div>
            <div class="sidebar-nav__sections svelte-1dq4s2d">
                <div class="sidebar-group svelte-oh8y4s">
                    <div class="sidebar-group-head svelte-oh8y4s sidebar-group-head--has-collapse">
                        <div rel="external" class="sidebar-group-head__link svelte-oh8y4s"> Learning</div> <button
                            class="sidebar-group-head__collapse svelte-oh8y4s"><span
                                class="sidebar-group-head__collapse-icon svelte-oh8y4s"><svg
                                    class="icon icon--common-caret svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/common.svg#icon-caret"></use>
                                </svg></span></button>
                    </div>
                    <div class="sidebar-group-items svelte-oh8y4s">
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-course svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/assets/images/sidebar-nav.svg#icon-course"></use>
                                    <FontAwesomeIcon :icon="faRocket" />
                                </svg></div> <a href="/quests" rel="external" class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Course</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-tasks svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-tasks"></use>
                                </svg></div> <a href="/tasks" rel="external" class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Tasks</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-quizzes svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-quizzes"></use>
                                </svg></div> <a href="/quizzes" rel="external" class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Surveys &amp; Quizzes</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-games svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-games"></use>
                                </svg></div> <a href="/projects/games" rel="external"
                                class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Games</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-help svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-help"></use>
                                </svg></div> <a href="/help" rel="external" class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Help</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-kick svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-kick"></use>
                                </svg></div> <a href="/schedule" rel="external" class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Schedule</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-group svelte-oh8y4s">
                    <div class="sidebar-group-head svelte-oh8y4s sidebar-group-head--has-collapse">
                        <div rel="external" class="sidebar-group-head__link svelte-oh8y4s"> Community</div> <button
                            class="sidebar-group-head__collapse svelte-oh8y4s"><span
                                class="sidebar-group-head__collapse-icon svelte-oh8y4s"><svg
                                    class="icon icon--common-caret svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/common.svg#icon-caret"></use>
                                </svg></span></button>
                    </div>
                    <div class="sidebar-group-items svelte-oh8y4s">
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-friends svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-friends"></use>
                                </svg></div> <a href="/users" rel="external" class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Users</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-forum svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-forum"></use>
                                </svg></div> <a href="/forum" rel="external" class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Forum</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-chat svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-chat"></use>
                                </svg></div> <a href="/chat" rel="external" class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Chat</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-articles svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-articles"></use>
                                </svg></div> <a href="/groups/posts" rel="external"
                                class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Articles</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-success-stories svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-success-stories"></use>
                                </svg></div> <a href="/groups/stories" rel="external"
                                class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Success stories</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-activity svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-activity"></use>
                                </svg></div> <a href="/news" rel="external" class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Activity</div>
                            </a>
                        </div>
                        <div class="sidebar-nav-item svelte-o5onoi">
                            <div class="sidebar-nav-icon svelte-o5onoi"><svg
                                    class="icon icon--sidebar-nav-reviews svelte-ygx28l" aria-hidden="true">
                                    <use xlink:href="./assets/images/sidebar-nav.svg#icon-reviews"></use>
                                </svg></div> <a href="/about/reviews" rel="external"
                                class="sidebar-nav-link svelte-o5onoi">
                                <div class="sidebar-nav-label">Reviews</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-group svelte-oh8y4s">
                    <div class="sidebar-group-head svelte-oh8y4s"><a href="/prices" rel="external" role="link"
                            class="sidebar-group-head__link svelte-oh8y4s"> Subscriptions</a> </div>
                </div>
            </div>
        </nav>
    </div>
</template>

