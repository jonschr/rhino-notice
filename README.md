# Rhino Notice

To use this plugin, just activate it, and then add a class of "rhino" to any link or to any wrapper for a link. So, either of these will work:

```
<a href="#" class="rhino">Click me!</a>
```

```
<div class="rhino"><a href="#">Click me!</a></div>
```

## Customization of main output

You can customize the output like this, if you need to change the text:

```
add_filter( 'rhino_markup', 'rhino_my_custom_markup', 15, 1 );
function rhino_my_custom_markup( $markup ) {

  ob_start();
  ?>
  
    <div class="rhino__preheader">
        <p class="rhino__preheader-text">Rhino</p>
    </div>
    <div class="rhino__header">
        <h2>Go deposit free with Rhino</h2>
        <p>Satisfy your upfront deposit requirements</p>
    </div>
    <ol class="rhino__list">
        <li>
            <h3>Savings when you need them</h3>
            <p>Residents can save hundreds, sometimes thousands on upfront move-in costs. Get in the door quicker with more cash in your pocket.</p>
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
```

## Customization of the link
```
add_filter( 'rhino_link', 'rhino_my_custom_link', 10, 1 );
function rhino_my_custom_link( $link ) {
    return 'https://mywebsite.com';
}
```
