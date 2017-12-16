# Makers space website

I developed this site using material design. The cards display content nicely. I included php to allow for email subscription and contact form. I included reCAPTCHA. CAPTCHA-like system designed to establish that a computer user is human (normally in order to protect websites from bots).

## What's in the site?

Below a description of the different components of this site.

### Form

I use the PHP mail() function to send an email with PHP. This script  sends a text email. This is one way to handle sending you the results when a visitor to your website fills out a form.

First thing needed is a form element. When the user fills out the form above and clicks the submit button, the form data is sent for processing to a PHP file . The form data is sent with the HTTP POST method.

The form contains all the needed elements such as unput fields for  including the recaptcha tag (this comes from Google ).


### Form handler(php)

Form data is submitted to the PHP file for processing using POST here.
$_POST is an associative array of variables passed to the current script via the HTTP POST method.

To collect text input data, we use $_POST['fieldname'], where field name is value of the associated field's name attribute. So, for the example form, to collect data supplied by user in Namefield, we use $_POST['name']. You may collect data in this fashion for fields if value of the type attribute is text or email or date.

The handler makes sure that the form is fully field. So if an input field remains empty, an error will be thrown to the user. There is an if statement for each field.

The form handler also contains an if statement that deals with recaptcha response. So this statement will take care of the recaptcha response from the user. Should the user not fill in that part of the form correctly, an error will pop up and further processing will be stopped.

Ultimately, the handler contains code to build the actual email that will be sent. It contains all the headers( subject, body, replu-to...) needed to send the email. The handler also contains code for an error page should there be an issue in the processing.

At the end of the processing, the user is then redirected onto a "Thank you page". When processing is completed, user is automatically send onto an html page. 


## Built With

* [Materialize Css](http://materializecss.com/) - A modern responsive front-end framework based on Material Design
* [Animsition](http://git.blivesta.com/animsition/) - A simple and easy jQuery plugin for CSS animated page transitions.



