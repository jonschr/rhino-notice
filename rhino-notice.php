<?php
/*
	Plugin Name: Rhino Notice
	Plugin URI: https://elod.in
    Description: Just another plugin
	Version: 0.1
    Author: Jon Schroeder
    Author URI: https://elod.in

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
*/


/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}

// Plugin directory
define( 'RHINO_NOTICE', dirname( __FILE__ ) );

// Define the version of the plugin
define ( 'RHINO_NOTICE_VERSION', '0.1' );

add_action( 'wp_enqueue_scripts', 'prefix_enqueue' );
function prefix_enqueue() {
	
	// Plugin styles
    wp_enqueue_style( 'rhino-style', plugin_dir_url( __FILE__ ) . 'css/rhino-styles.css', array(), RHINO_NOTICE_VERSION, 'screen' );
    
    // Script
    wp_enqueue_script( 'rhino-toggle', plugin_dir_url( __FILE__ ) . 'js/rhino-toggle.js', array( 'jquery' ), RHINO_NOTICE_VERSION, true );
	
}

add_action( 'wp_footer', 'rhino_output_markup' );
function rhino_output_markup() {        
    
    echo '<div class="rhino__background"></div>';
    echo '<div class="rhino__slide-in">';
    
        // the close button
        echo '<a href="#" class="rhino__close">';
            echo '<span></span>';
            echo '<span></span>';
        echo '</a>';
    
        // the markup
        echo apply_filters( 'rhino_markup', $markup );    
        
        // the button
        $link = apply_filters( 'rhino_link', $link );
        printf( '<a class="rhino__button" href="%s" target="_blank">Learn more</a>', $link );
        
    echo '</div>';
        
}

add_filter( 'rhino_markup', 'rhino_default_markup', 10, 1 );
function rhino_default_markup( $markup ) {
    ob_start();
    
    ?>
    <div class="rhino__preheader"></div>
    <div class="rhino__header">
        <h2>Go deposit free with rhino</h2>
        <p>Satisfy your upfront deposit requirements</p>
    </div>
    <ol class="rhino__list">
        <li>
            <h3>Savings when you need them</h3>
            <p>Residents can save hundres, sometimes thousands on upfront move-in costs. Get in the door quicker with more cash in your pocket.</p>
        </li>
        <li>
            <h3>Hassle-free enrollment</h3>
            <p>Sign up for Rhino in as little as 60 seconds. After you have completed your lease application and are approved, you will receive an email invite to enroll, choose your payment plan, set up your payment, and get ready to move in.</p>
        </li>
        <li>
            <h3>Personalized pricing</h3>
            <p>Every Rhino renter receives personalized pricing and flexible payment options</p>
        </li>
    </ol>
    
    <?php
        
    return ob_get_clean();
}

add_filter( 'rhino_link', 'rhino_default_link', 10, 1 );
function rhino_default_link( $link ) {
    return 'https://www.sayrhino.com';
}