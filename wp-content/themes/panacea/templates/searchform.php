<?php global $wp_query;
$arrgs = $wp_query->query_vars; ?>


<!-- / widget-inner -->
<div class="widget-inner">
  <form method="get" id="searchform" class="form-search" action="<?php echo home_url('/'); ?>">
    <fieldset>
      <div class="searchIcon">
        <input type="text" value="<?php echo (isset($arrgs['s']) && $arrgs['s']) ? $arrgs['s'] : ''; ?>" name="s" id="s" type="text" class="span12" placeholder="<?php _e('Search', 'ct_theme')?>">
        <input type="submit" >
      </div>
    </fieldset>
  </form>
</div>
<!-- / widget-inner -->