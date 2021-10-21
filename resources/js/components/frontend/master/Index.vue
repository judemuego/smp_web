<template>
    <div>
        <sidebar-page></sidebar-page>
        <header-page></header-page>
        <transition name="fade" mode="out-in"><router-view></router-view></transition>
        <footer-page></footer-page>
    </div>
</template>
<style>
.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.3s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}
</style>

