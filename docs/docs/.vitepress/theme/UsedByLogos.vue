<template>
  <div class="used-by-logos">
    <a href="https://moz.com/" target="_blank" rel="noopener">
      <img src="./img/moz-logo.svg" aria-label="Moz logo" width="140" height="40" />
    </a>
    <a href="https://craftcms.com/" target="_blank" rel="noopener">
      <img src="./img/craft-cms-logo.svg" aria-label="Craft CMS logo" width="220" height="55" />
    </a>
  </div>
</template>

<style scoped>
.used-by-logos {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.used-by-logos a:not(:last-child) {
  margin-right: 2rem;
}
</style>
