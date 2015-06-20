<?php
/*
Plugin Name: Search and Replace
Plugin URI: http://thedeadone.net/software/search-and-replace-wordpress-plugin/
Description: Does a simple search and replace on all post using SQL replace.
Version: 1.1
Author: Mark Cunningham
Author URI: http://thedeadone.net/
*/

/* To use this plugin, just dump it in your wp-content/plugins directory and then
   activate from the wp-admin interface. It'll add a new panel to the "manage"
   section of the wp-admin interface. Use it at your own risk */

/* Not sure if I'm doing this the right way... */

if(!is_plugin_page()) {

function tdo_searchandreplace_hook(){
 if (function_exists('add_management_page')) {
  add_management_page('Search and Replace',
                      'Search and Replace',
                      10, /* only admins */
                      basename(__FILE__),
                      'tdo_searchandreplace_hook');
 } }

add_action('admin_head','tdo_searchandreplace_hook');
} else {

/* this does the important stuff! */
function tdo_do_searchandreplace($search_text,$replace_text,$content=TRUE,$title=TRUE,$excerpt=TRUE,$comment_content=TRUE,$comment_author=TRUE){
 global $wpdb;

 /* TODO: Some proper tests! */
 /* TODO: Filter by posts and pages */
 /* TODO: Filter by category */
 /* TODO: Get info (such as errors) from results? */

 if(!$content && !$title && !$excerpt && !$comment_content && !$comment_author){
  return 'Nothing selected to modify!';
 }

 if($content) {
  echo "<p>Looking @ modifying post content...</p>";
  $query = "UPDATE $wpdb->posts ";
  $query .= "SET post_content = ";
  $query .= "REPLACE(post_content, \"$search_text\", \"$replace_text\") ";
  $wpdb->get_results($query); }

 if($title) {
  echo "<p>Looking @ post titles...</p>";
  $query = "UPDATE $wpdb->posts ";
  $query .= "SET post_title = ";
  $query .= "REPLACE(post_title, \"$search_text\", \"$replace_text\") ";
  $wpdb->get_results($query); }

 if($excerpt) {
  echo "<p>Looking @ post excerpts...</p>";
  $query = "UPDATE $wpdb->posts ";
  $query .= "SET post_excerpt = ";
  $query .= "REPLACE(post_excerpt, \"$search_text\", \"$replace_text\") ";
  $wpdb->get_results($query); }

 if($comment_content) {
  echo "<p>Looking @ modifying comments text...</p>";
  $query = "UPDATE $wpdb->comments ";
  $query .= "SET comment_content = ";
  $query .= "REPLACE(comment_content, \"$search_text\", \"$replace_text\") ";
  $wpdb->get_results($query); }

  if($comment_author) {
  echo "<p>Looking @ modifying comments author...</p>";
  $query = "UPDATE $wpdb->comments ";
  $query .= "SET comment_author = ";
  $query .= "REPLACE(comment_author, \"$search_text\", \"$replace_text\") ";
  $wpdb->get_results($query); }

 return '';
}

?>

<div class="wrap">
<h2>Search and Replace (1.1)</h2>

<?php if(isset($_POST['submitted'])) {
       if(empty($_POST['search_text'])) { ?>
        <p><strong>You must specify some text to replace!</strong></p>
<?php  } else { ?>
        <p><strong>Attempting to perform search and replace...</strong></p>
        <p>Searching for <code><?php echo $_POST['search_text']; ?></code>...</p>

<?php   $error =
         tdo_do_searchandreplace($_POST['search_text'],
                                 $_POST['replace_text'],
                                 isset($_POST['content']),
                                 isset($_POST['title']),
                                 isset($_POST['excerpt']),
                                 isset($_POST['comment_content']),
                                 isset($_POST['comment_author']));
        if($error != '') { ?>

         <p><strong>There was an error!</strong></p>
         <p><code><?php echo $error; ?></code></p>

<?php   } else { ?>

         <p><strong>Completed successfully!</strong></p>

<?php   } } } ?>

<p>This plugin uses an standard SQL query so it modifies your database directly.
   You <b>cannot</b> undo any changes made by this plugin. It is therefore
   advisable to backup your database before running this plugin.</p>

<p>Text search is case sensitive and has no pattern matching capabilites.
   You can chose to modify post excerpts, comment authors and post and comment
   content and titles.. This replace function matchs raw text so it can be used
   to replace HTML tags too.</p>

<form name="replace" action="" method="post">
 <fieldset>
 <legend>Search</legend>
 <table>
   <tr>
    <td colspan=2><input type='checkbox' name='content' id='content_label' value='1' checked='checked' /><label for="content_label"> Content</label></td>
   </tr>
   <tr>
    <td colspan=2><input type='checkbox' name='title' id='title_label' value='1' checked='checked' /><label for="title_label"> Titles</label></td>
   </tr>
   <tr>
    <td colspan=2><input type='checkbox' name='excerpt' id='excerpt_label' value='1' checked='checked' /><label for="excerpt_label"> Excerpts</label></td>
   </tr>
   <tr>
    <td colspan=2><input type='checkbox' name='comment_content' id='comment_content_label' value='1' checked='checked' /><label for="comment_content_label"> Comments content</label></td>
   </tr>
   <tr>
    <td colspan=2><input type='checkbox' name='comment_author' id='comment_author_label' value='1' checked='checked' /><label for="comment_author_label"> Comments author</label></td>
   </tr>
  </table>
  </fieldset>
  <br/>
  <fieldset>
  <table>
   <tr>
    <td>Replace Text</td>
    <td><input type="text" name="search_text" value="" size="30" /></td>
   </tr><tr>
    <td>with</td>
    <td><input type="text" name="replace_text" value="" size="30" /></td>
   </tr><tr>
    <td><input type="submit" value="Replace!"  />
    </td>
   </tr>
  </table>
  <input type="hidden" name="submitted" />
  </fieldset>
</form>

<p><a href="http://thedeadone.net/software/search-and-replace-wordpress-plugin/">Plugin Webpage</a></p>

<p>Search and Replace plugin created by <a href="http://thedeadone.net/">Mark Cunningham</a></p>
<p>Seach and Replace in comments provided by <a href="http://www.gonahkar.com">Gonahkar</a></p>

</div> <!-- wrap -->

<?php } ?>
