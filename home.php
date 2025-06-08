<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>
<?php
    include ( 'includes/mainNav.php' ) ;
?>
<div class="container" style="background-color: #f8f9fa; padding: 20px;">
    <h1 class="mt-5">Welcome to MK-Times!</h1>
    <p class="lead">This is a simple CRUD application built with PHP and MySQL.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>

    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
    <p>Use the navigation bar to explore the application.</p>
<?php
include ('includes/footer.php');
?>	