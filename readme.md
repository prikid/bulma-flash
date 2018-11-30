# Easy Flash Messages for Your Laravel App

This composer package offers a Bulma optimized flash messaging setup for your Laravel applications.

Thank you to Laracasts for providing the base with Bootstrap:
https://github.com/laracasts/flash

## Installation

Begin by pulling in the package through Composer.

```bash
composer require kerryjones/bulma-flash
```

Next, as noted above, the default CSS classes for your flash message are optimized for Bulma. As such, either pull in the Bulma's CSS within your HTML or layout file, or write your own CSS based on these classes.

```html
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
```

## Usage

Within your controllers, before you perform a redirect, make a call to the `flash()` function.

```php
public function store()
{
    flash('Welcome Aboard!');

    return home();
}
```

You may also do:

- `flash('Message')->success()`: Set the flash theme to "success".
- `flash('Message')->error()`: Set the flash theme to "danger".
- `flash('Message')->warning()`: Set the flash theme to "warning".
- `flash('Message')->overlay()`: Render the message as an overlay.
- `flash()->overlay('Modal Message', 'Modal Title')`: Display a modal overlay with a title.
- `flash('Message')->important()`: Add a close button to the flash message.
- `flash('Message')->error()->important()`: Render a "danger" flash message that must be dismissed.

With this message flashed to the session, you may now display it in your view(s). Because flash messages and overlays are so common, we provide a template out of the box to get you started. You're free to use - and even modify to your needs - this template how you see fit.

```html
@include('flash::message')
```

## Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
</head>
<body>

<div class="container">
    @include('flash::message')

    <p>Welcome to my website...</p>
</div>

<!-- If using flash()->important() or flash()->overlay(), you'll need to pull in the JS for Modal. -->
<script src="//code.jquery.com/jquery.js"></script>

<script>
    $('#flash-overlay-modal').addClass('is-active');
</script>

</body>
</html>
```

If you need to modify the flash message partials, you can run:

```bash
php artisan vendor:publish --provider="KerryJones\Flash\FlashServiceProvider"
```

The two package views will now be located in the `resources/views/vendor/flash/` directory.

```php
flash('Welcome Aboard!');

return home();
```

```php
flash('Sorry! Please try again.')->error();

return home();
```

```php
flash()->overlay('You are now a member!', 'Yay');

return home();
```

## Hiding Flash Messages

A common desire is to display a flash message for a few seconds, and then hide it. To handle this, write a simple bit of JavaScript. For example, using jQuery, you might add the following snippet just before the closing `</body>` tag.

```html
<script>
$('div.notification').not('.notification-important').delay(3000).removeClass('is-active');
</script>
```

This will find any notifications - excluding the important ones, which should remain until manually closed by the user - wait three seconds, and then fade them out.

## Multiple Flash Messages

Need to flash multiple flash messages to the session? No problem.

```php
flash('Message 1');
flash('Message 2')->important();

return redirect('somewhere');
```

Done! You'll now see two flash messages upon redirect.


