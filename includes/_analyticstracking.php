<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo getOption('analytics_code'); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo getOption('analytics_code'); ?>');
</script>