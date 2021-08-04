# php-order-form

## Mission
With the given code, complete it so both php forms work together. 

## How the code works 
There are allready some functions given in the index.php form, make them work nicely together. A part of the logic is given here, you can find the steps below ; 
    - 1. accepting orders : show order confirmation, display order & info.
    - 2. validation : check the following : 
        - required fields aren't empy.
        - Zip code are only numbers.
        - Show empty or invalid data on top (bootstrap alerts).
        - When invalid data, show previous values so user doesn't has to re-type
    - 3. improve UX by saving user data :
        - $_SESSION[] for sensitive information and data.
        - $_POST[] for less sensitive information (auto-fill)

## Main funtions & logic 
All basic steps are completed ; 
    - 1. function validate() :
        If there are any empty fields passed, add it to the $errors array and return it.
    - 2. function handleform($products) : 
        if (invalidFields gets passed aka 'is not empty') then :
            - loop each invalidField through the message variable, and return that variable. 
            - If errors get passed, return true and therefore show message (linked with index.php)
        else ():
            - get the keys from $_POST[list of products];
            - create a new empty array in variable $productnames (so we can fetch this later on)
            -setcookie :  * BROKEN * for an hour. Gets added but not as string
            - foreach : (passed productNumber ) take the 'name' key, then return message accordingly showing the ordered product.
            - return : make sure there are no errors passed (false), then return correct message. 
    - 3. Tell php that if $_POST[] is NOT empty :
            - the form thus has been submitted.
            - take that input and put it through variable $result [].
            - declare that when your result from handleform($products) is passed, this gets saved in the variable $result. 
