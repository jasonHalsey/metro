<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage metro
 * @since Twenty Sixteen 1.0
 */
?>

<?php $search_text = "Search &hellip;"; ?> 

    <h2 class="widget-title"><?php echo _x( 'Search Blog:', 'label', 'twentysixteen' ); ?></h2>

<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"> 
<input type="text" value="<?php echo $search_text; ?>"  
name="s" id="s"  
onblur="if (this.value == '')  
{this.value = '<?php echo $search_text; ?>';}"  
onfocus="if (this.value == '<?php echo $search_text; ?>')  
{this.value = '';}" /> 
<input type="hidden" id="searchsubmit" /> 
</form>
