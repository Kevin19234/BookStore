<?php # Script 3.7 - index.php #2

// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_ad() {
  echo '<div class="alert alert-info" role="alert"><p>This is an annoying ad! This is an annoying ad! This is an annoying ad! This is an annoying ad!</p></div>';
} // End of the function definition.

$page_title = 'Home';
include('includes/header.html');


// Call the function:

?>
 
<div class="page-header"><h1>Welcome Valued Costumer!</h1></div>
<p>The Online Book Store provides a selection of books to choose from where you can choose what Books you would be interested in from the comfort of your home. With times being tough outside and most people staying indoors the online website caters to your preference without ever stepping foot outside.</p>

<p>The Online Book Store offers an selection of books to choose from but the feature that is most convienient is the new checkout system which allows you our valued costumer to select the book or books of your choice and reserve it for Purchase This is a great Alternative to going out and instead ordering the book right from the comfort of your own home. </p>

<p> The library is created to show you an inventory of books for you to choose from, if you like a book feel free to add it to the cart. You want a little more? no problem, add as many books from our inventory as you like the cart will begin to add the items and calculate your order total. Want more of one book? you can also add up to five of the same books to your order and the total will be calculated for you! hit that order button and you will recieve a confirmation message.</p>

<p> Hope you Enjoy!</p>


<?php
// Call the function again:

include('includes/footer.html');
?>