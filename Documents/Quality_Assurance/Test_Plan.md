# Introduction

This document is a test plan for the Jacobi Carbon Group ©, this company asked us to realize a project to be able to display information on screens located in the factories, we have to realize a web site to be able to create content on these screens and interact with them. The screens are located in the factories and are used to display information about the production of the company, the screens are connected to the internet and are able to display information from the website.

<hr>

# Test Environment
To test the website we will use some differents environments, we need to test the website on different devices and browsers to be sure that the website is working on all of them.

## Search Engine and Devices
We will use the different search engine to test the website:
- Google Chrome on Windows 11
- Firefox on Windows 11
- Microsoft Edge on Windows 11
- Google Chrome on Mac OS Monterey
- Safari on Mac OS Monterey
- Brave on Mac OS Monterey
- Google Chrome on Android 11 (Samsung A50)
- Samsung Internet on Android 11 (Samsung A50)
- Google Chrome on IOS 15.7.2 (iPhone 12 Pro)
- Safari on IOS 16 (iPhone 13)

| Device | OS | Browser | Version | Working ? |
| --- | --- | --- | --- | --- |
| Lenovo Laptop | Windows 11 | Google Chrome | 96.0.4664.45 | Yes |
| Lenovo Laptop | Windows 11 | Firefox | 94.0.2 | Yes |
| Lenovo Laptop | Windows 11 | Microsoft Edge | 96.0.1054.34 | Yes |
| Macbook Air M1 | Mac OS Monterey | Google Chrome | 96.0.4664.55 | Yes |
| Macbook Air M1 | Mac OS Monterey | Safari | 15.1 | Yes |
| Macbook Air M1 | Mac OS Monterey | Brave | 1.33.106 | Yes |
| Samsung A50 | Android 11 | Google Chrome | 96.0.4664.45 | Yes but we have denied the access at the custom page for mobile |
| Samsung A50 | Android 11 | Samsung Internet | 19 | Yes but we have denied the access at the custom page for mobile |
| iPhone 12 Pro | IOS 15.7.2 | Google Chrome | 96.0.4664.45 | Yes but we have denied the access at the custom page for mobile |
| iPhone 13 | IOS 16 | Safari | 15.1 | Yes but we have denied the access at the custom page for mobile |

For information, we have denied the access at the custom page from mobile because the website is responsive but the user experience on the custom page is not good on mobile, we have decided to redirect the user to the home page if he is on mobile.

For your information, the browser market share at a worldwide level is the following:
- Google Chrome: 65.86%
- Safari: 18.67%
- Microsoft Edge: 4.45%
- Firefox: 3.04%
- Samsung Internet: 2.68%
- Brave: no usable figures

So to conclude, our website can works throught 94.7% of the browsers used in the world.


<hr>

# Test Plan
## Sign Up Page
In this page we expect to be able to create an account, the user will have to enter his name, his email and his password, the password must be at least 8 characters long and must contain at least one number and one capital letter, the email must be unique and must be a valid email, the user will have to accept the terms and conditions of the website to be able to create an account.

| Test Name | Description | Steps | Expected Result | Actual Result | Priority |
| --- | --- | --- | --- | --- | --- |
| Valid Email | The email must be unique and must be a valid email | 1 - Enter a valid email | The email is accepted | The email is accepted | High |
| Invalid Email | The email must be unique and must be a valid email | 1 - Enter an invalid email <br> 2 - Display a message to warn the user to enter a valid email | The email is not accepted | The email is not accepted | High |
| Non-Unique Email | The email must be unique and must be a valid email | 1 - Enter an email that is already used | The email is not accepted | The email is not accepted | Medium |
| Valid Password | The password must be at least 8 characters long and must contain at least one number and one capital letter | 1 - Enter a password that is 8 or more characters long with a capital letter and a number| The password is accepted | The password is accepted | High |
| Invalid Password | The password must be at least 8 characters long and must contain at least one number and one capital letter | 1 - Enter a password that is less than 8 characters long or does not contain a capital letter or a number <br> 2 - Display a message to warn the user to enter a valid password | The password is not accepted | The password is accepted | Medium |
| Unconfirmed password | The user must confirm his password | 1 - Enter a password and a confirmation password that are different | The password is not accepted | The password is not accepted | High |
| Confirmed Password | The user must confirm his password | 1 - Enter a password and a confirmation password that are the same | The password is accepted | The password is accepted | High |
| Unaccepted Terms and Conditions | The user must accept the terms and conditions of the website to be able to create an account | 1 - Do not accept the terms and conditions | The account is not created | The account is not created | High |
| Accepted Terms and Conditions | The user must accept the terms and conditions of the website to be able to create an account | 1 - Accept the terms and conditions | The account is created | The account is created | High |

<hr>

## Login Page
In this page we expect to be able to log in to the website, the user will have to enter his email and his password, the email must be a valid email and the password must be at least 8 characters long and must contain at least one number and one capital letter, the user can retrieve his password if he forgot it.

| Test Name | Description | Steps | Expected Result | Actual Result | Priority |
| --- | --- | --- | --- | --- | --- |
| Valid Email | The email must be a valid email | 1 - Enter a valid email | The email is accepted | The email is accepted | High |
| Invalid Email | The email must be a valid email | 1 - Enter an invalid email <br> 2 - Display a message to warn the user to enter a valid email | The email is not accepted | The email is not accepted | High |
| Valid Password | The password must be at least 8 characters long and must contain at least one number and one capital letter | 1 - Enter a password that is 8 or more characters long with a capital letter and a number| The password is accepted | The password is accepted | High |
| Invalid Password | The password must be at least 8 characters long and must contain at least one number and one capital letter | 1 - Enter a password that is less than 8 characters long or does not contain a capital letter or a number <br> 2 - Display a message to warn the user to enter a valid password | The password is not accepted | The password is not accepted | Medium |
| Forgot Password | The user can retrieve his password if he forgot it | 1 - Click on the forgot password link <br> 2 - Enter the email of the account <br> 3 - Click on the send button <br> 4 - Display a message to warn the user that an email has been sent to him | The email is sent | Nothing, it's not implemented | Low |
| Remember Me | The user can choose to be remembered | 1 - Check the remember me checkbox <br> 2 - Log in <br> 3 - Close the browser <br> 4 - Open the browser <br> 5 - The user is logged in | The user is logged in | Nothing, it's not implemented | Low |

<hr>

## Navigation Bar
In this bar we expect to be able to navigate through the website, the user will have to click on the links to be able to access the different pages of the website, but the user will not be able to access the pages if he is not logged in and if it is the user will be able to disconnect from the website.

* *I will use the term navbar to design the Navigation Bar*

| Test Name | Description | Steps | Expected Result | Actual Result | Priority |
| --- | --- | --- | --- | --- | --- |
| Well display navbar | The navbar must be well displayed | 1 - Log in <br> 2 - The navbar is well displayed | The navbar is well displayed | The navbar is well displayed | High |
| Not display navbar | The navbar must not be displayed | 1 - Do not log in <br> 2 - The navbar is not displayed | The navbar is not displayed | The navbar is not displayed | High |
| Links redirection | The links must redirect to the correct page | 1 - Click on the links <br> 2 - The user is redirected to the correct page | The user is redirected to the correct page | The user is redirected to the correct page | High |
| Logout button | When the user clicks he/she should be logged out and redirected to the login page | 1 - Click logout button <br> 2 - The user is disconnected <br> 3 - The user is redirected to the login page | The user can be disconnected | The user can be disconnected | High |
<hr>

## View Screens Page

Here we expect to be able to view in real time the screens that are in the factories, the user will have to click on the screen to be able to see the content of the screen, the user will also be able to see the status of the screen, if the screen is online or offline, the user will also be able to see the name of the screen of the screen.

| Test Name | Description | Steps | Expected Result | Actual Result | Priority |
| --- | --- | --- | --- | --- | --- |
| Well display the page | The page must be well displayed | 1 - Log in <br> 2 - Click on the view screens button in navbar <br> 3 - The page is well displayed | The page is well displayed | The page is well displayed | High |
| Can View all screens | The user can view every screens that exists | 1 - Log in <br> 2 - Click on the view screens button in navbar <br> 3 - The user can view all screens | The user can view all screens | The user can view all screens | High |
| Can View screen Properties | The user can view the properties of the screen | 1 - Log in <br> 2 - Click on the view screens button in navbar <br> 3 - Click on a screen <br> 4 - The user can view the content, the name and the status(On/Off) of the screen | The user can view the properties of the screen | The user can view the properties of the screen | High |
<hr>

## Create a Template to Display
In this section we must allow the user to create some scenes templates, the user have to name the scene, write a description, set the orientation, set the theme of template, drag and drop the widgets, adjust the size, adjust the position, delete a widget, save the template, modify an existing template and finally publish the template.

| Test Name | Description | Steps | Expected Result | Actual Result | Priority |
| --- | --- | --- | --- | --- | --- |
| Well display the page | The page must be well displayed | 1 - Log in <br> 2 - Click on the create template button in navbar <br> 3 - The page is well displayed | The page is well displayed | The page is well displayed | High |
| Can set the name and description | The user can create a scene and name it | 1 - Log in <br> 2 - Click on the create template button in navbar <br> 3 - Click on the create button <br> 4 - Enter a name and a description <br> 5 - The user can create a scene and name it | The user can create a scene and name it | The user can create a scene and name it | High |
| Can set an orientation | If the user select the portrait orientation, the scene editor will be in portrait mode, if the user select the landscape orientation, the scene editor will be in landscape mode | 1 - Click on the selected orientation <br> 2 - Click to the button "Next" <br> 3 - The scene editor must be at the good orientation | The user can select the orientation | The user can select the orientation | Medium |
| Can set a theme | The user can select a theme for the scene | 1 - Click on the selected theme at the left panel<br> 2 - The scene editor must be at the good theme | The user can select the theme | The user can select the theme | Low |
| Can make a widget appear | The user can click on a widget in the bottom panel, and it should be displayed in the editing window | 1 - Select a widget in the bottom panel and click on it <br> 2 - The widget should be displayed in the editing window | The user can make a widget appear | The user can make a widget appear | High |
| Can modify the position of a widget | The user can drag the widget in the editing window and it should be displayed in the new position | 1 - Drag the widget in the editing window <br> 2 - The widget should be displayed in the new position | The user can modify the position of a widget | The user can modify the position of a widget | High |
| Can adjust the widget size | The user can adjust the size of the widget in the editing window | 1 - Click on the widget in the editing window <br> 2 - Drag the resize button at the bottom right corner <br> 3 - The size has been modified | The user can adjust the size of the widget | The user can adjust the size of the widget | High |
| Can delete a widget | The user can delete a widget in the editing window | 1 - Click on the widget in the editing window <br> 2 - Click on the delete button at the top right corner <br> 3 - The widget has been deleted | The user can delete a widget | The user can delete a widget | High |
| Can save a template | The user must be able to save a template | 1 - Click on the save button in the left panel <br> 2 - The template has been saved | The user can save a template | The user can save a template | Medium |
| Can modify a template | The user must be able to modify an existing template | 1 - Click on the load button in the left panel <br> 2 - Select a scene template in the pop-up windows <br> 3 - The selected scene must be displayed and can be modified | The user can modify a template | Not Implemented | Low |
| Can publish a template | The user must be able to publish a template | 1 - Click on the publish button in the left panel <br> 2 - Select on wich screen you want the template to be displayed | The user can publish a template | The user can publish a template | High |


<hr>


## Manage Screens Page

Here we expect to be able to manage the screens, the user will have to click on the links to be able to access the different pages of the screen management, the user will also be able to add a screen, edit a screen and delete a screen. He can also modify the status of the screen(On/Off), select a time period to display the screen and select a template to display at this time. 

| Test Name | Description | Steps | Expected Result | Actual Result | Priority |
| --- | --- | --- | --- | --- | --- |
| Well display the page | The page must be well displayed | 1 - Log in <br> 2 - Click on the manage screens button in navbar <br> 3 - The page is well displayed | The page is well displayed | The page is well displayed | High |
| Can see every scenes | The user can see every scenes that exists | 1 - Log in <br> 2 - Click on the manage screens button in navbar <br> 3 - The user can see every scenes | The user can see every scenes | The user can see every scenes | High |
| Can Remove a scene | The user can remove a scene | 1 - Click on the remove button <br> 2 - The scene has been removed | The user can remove a scene | The user can remove a scene | High |
| The user can publish a scene | The user can publish a scene | 1 - Click on the publish button <br> 2 - The scene has been published | The user can publish a scene | The user can publish a scene | High |
| The user can edit a scene | The user can edit a scene | 1 - Click on the edit button <br> 2 - The scene has been edited | The user can edit a scene | Not Implemented | Low |
| The user can set a time period | The user can set a time period | 1 - Click on the time period button <br> 2 - The user can set a time period | The user can set a time period | Not Implemented | Low |
| The user can modify the status of the screen | The user can modify the status of the screen | 1 - Click on the status button <br> 2 - The user can modify the status of the screen | The user can modify the status of the screen | Not Implemented | Low |
<hr>

## My account Page
Here we expect to be able to manage our account, the user will have to click on the links to be able to access the different pages of the account management, the user will also be able to log out of his account.
In this section we can also choose the theme of the website(light or dark), We can also choose the language of the website(French or English). The information displayed in the account page will be the name, the mail adress, the date of creation of the account, the role of the account(Admin or User) and the last time the account was connected.

| Test Name | Description | Steps | Expected Result | Actual Result | Priority |
| --- | --- | --- | --- | --- | --- |
| Well display the page | The page must be well displayed | 1 - Log in <br> 2 - Click on the my account button in navbar <br> 3 - The page is well displayed | The page is well displayed | The page is well displayed | High |
| Can change the theme | The user can change the theme of the website | 1 - Click on the theme button <br> 2 - Select the theme <br> 3 - The theme has been changed | The user can change the theme | The user can change the theme | Low |
| Can change the language | The user can change the language of the website | 1 - Click on the language button <br> 2 - Select the language <br> 3 - The language has been changed | The user can change the language | The user can change the language | Low |
| Can log out | The user can log out of his account | 1 - Click on the log out button <br> 2 - The user is logged out | The user can log out | The user can log out | High |
| Can change the password | The user can change his password | 1 - Click on the change password button <br> 2 - Enter the old password <br> 3 - Enter the new password <br> 4 - Confirm the new password <br> 5 - The password has been changed | The user can change the password | The user can change the password | Medium |
| Can change the mail adress | The user can change his mail adress | 1 - Click on the change mail adress button <br> 2 - Enter the new mail adress <br> 3 - Confirm the new mail adress <br> 4 - The mail adress has been changed | The user can change the mail adress | The user can change the mail adress | Medium |

