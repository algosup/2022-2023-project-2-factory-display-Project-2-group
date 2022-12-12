# Technical Specification

- 2022 Project Factory Display Group 2
- Team:
    - [Nicolas Mida](https://github.com/Nicolas-Mida)
    - [Pierre Gorin](https://github.com/Pierre2103)
    - [Grégory Pagnoux](https://github.com/Gregory-Pagnoux)
    - [Audrey Telliez](https://github.com/audreytllz)
    - [Rémy Charles](https://github.com/RemyCHARLES)
- Created on: 2022-08-11
- Last update: _____

___

<details><summary>Table of Contents</summary>

- [Technical Specification](#technical-specification)
  - [1. Introduction](#1-introduction)
    - [a. Overview](#a-overview)
    - [b. Context](#b-context)
    - [c. Goals](#c-goals)
    - [d. Out of Scope](#d-out-of-scope)
    - [e. Assumptions](#e-assumptions)
  - [2. Solutions](#2-solutions)
    - [a. Current or Existing Solution / Design](#a-current-or-existing-solution--design)
    - [b. Suggested or Proposed Solution / Design](#b-suggested-or-proposed-solution--design)
  - [](#)
    - [c. Technical Requirements](#c-technical-requirements)
    - [d. Test Plan](#d-test-plan)
    - [e. Release / Roll-out and Deployment Plan](#e-release--roll-out-and-deployment-plan)
    - [f. Alternate Solutions / Designs](#f-alternate-solutions--designs)
  - [3. Further Considerations](#3-further-considerations)
    - [a. Cost analysis](#a-cost-analysis)
    - [b. Security considerations](#b-security-considerations)
    - [c. Accessibility considerations](#c-accessibility-considerations)
    - [d. Risks](#d-risks)
  - [4. Success Evaluation](#4-success-evaluation)
    - [a. Impact](#a-impact)
    - [b. Metrics](#b-metrics)
  - [5. Work](#5-work)
  - [6. Glossary](#6-glossary)

</details>

___

<br>

## 1. Introduction

### a. Overview

We need to create a device to display important company information or information from everyday life on screens located in the canteen and the locker room. 

For this, we will use web pages and single board computers with a wired connection by ethernet cable.

### b. Context

<p>
  In the Jacobi factory only half of the employees can receive important information about the factory and the company. And the distribution of information by paper is not appropriate in a factory of 8 hectares.
</p>

<p>
  So that's why we are working on a screen installation allowing the diffusion of important information in strategic places. (canteen, locker room).
</p>
<p>
 An Admin will be able to choose between different customizable widgets in order to diffuse them on the screens or he will choose beforehand if it is vertical or horizontal.
</p>

### c. Goals

- The objective is to allow employees who do not have an email address to be informed of information or instructions given by the company through screens. 

### d. Out of Scope

- The screens must be usable only for displaying information (e.g. impossible to show a soccer game).
<br>


### e. Assumptions

- This requires an internet installation, a tv, a computer, a device and some cable otherwise this project would be impossible.

<br>

## 2. Solutions

### a. Current or Existing Solution / Design

- There are already devices for digital signage in companies like [**I-video**](#6-glossary). It works through a device behind the screen and is connected to the internal internet network. Their interface allows to create a horizontal or vertical display with information such as the weather or private information of the company as the date of the next HR meeting .
<br>

### b. Suggested or Proposed Solution / Design

- The solution that we propose to [**Jacobi Group**](#6-glossary) is realized with the whole of their criteria, they can be similar in some point to the existing version but it will allow the user to create a 100% his interface and to have the whole control of his device without leakage of information in the cloud or any problem of security.
<br>
- 
<!-- ! Add more info -->

### c. Technical Requirements

| Technical | Using |
| --------- | ----- |
| [HTML](https://developer.mozilla.org/fr/docs/Web/HTML) <br> *version: 5.0* | HyperText Markup Language : is the code used to structure a web page and its content. For example, the content of your page can be structured as a set of paragraphs, a bulleted list or with images and data tables. |
| [JS](https://www.javascript.com/) <br> *version: 1.5*| JavaScript : is a programming language that allows you to create dynamically updated content, control multimedia content, animate images, and anything else you can think of. |
| [CSS](https://developer.mozilla.org/fr/docs/Web/CSS) <br> *version: 3.0* | Cascading Style Sheets : is a style sheet language used for describing the presentation of a document written in a markup language such as HTML. |
| [Bootstrap](https://getbootstrap.com/) *version: 5.2.2* | Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. |
| [PHP](https://www.php.net/) <br> *version: 7.2.5* | PHP : is a general-purpose scripting language especially suited to web development. |
| [MySQL](https://www.mysql.com/fr/) <br> *version: 8.0.26* | MySQL is an open-source relational database management system. |
| [Jquery](https://jquery.com/) <br> *version: 3.6.0* | Jquery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax. |
| [Microsoft Azure](https://azure.microsoft.com/fr-fr/)| Azure is a cloud computing service created by Microsoft for building, testing, deploying, and managing applications and services through Microsoft-managed data centers. |
| [NodeJS](https://nodejs.org/en/) <br> *version: 18.12.1*| Node.js is an open-source, cross-platform, back-end JavaScript runtime environment that runs on the V8 engine and executes JavaScript code outside a web browser. |
| [Rock Pi 4B+](https://wiki.radxa.com/Rockpi4) <br> *version: 4B+* | Rock Pi 4 is a powerful single board computer that features the Rockchip RK3399 hexa-core processor, 4GB LPDDR4 RAM, 32GB eMMC flash, and dual Gigabit Ethernet. |
| [Python](https://www.python.org/) <br> *version: v2022.18.2* | Python is an interpreted, high-level, general-purpose programming language. |
| [Selenium](https://www.selenium.dev/) <br> *version: 3.141.0* | Selenium is a portable framework for testing web applications. Selenium provides a playback tool for authoring tests without the need to learn a test scripting language (Selenium IDE). It also provides a test domain-specific language (Selenese) to write tests in a number of popular programming languages, including C#, Groovy, Java, Perl, PHP, Python, Ruby and Scala. |

<br>

### d. Test Plan

See the document Test Plans. <!-- ! add a link -->

### e. Release / Roll-out and Deployment Plan
<!-- ! TO DO -->


### f. Alternate Solutions / Designs

- To realize this project we could have used Smart Tv's which would have avoided the use of a mini computer but this would have included the creation of an [**android**](#6-glossary) application and decrease the ease of installation. 
<br>

## 3. Further Considerations

### a. Cost analysis

First of all, you will need two screens (here Liyama at 899€ each), two SBC devices (here Rock pi 4B+ at 142,99€ each) and two microSD cards (about 6,40€ each).

| | Quantity | Unit price | Total price |
| --- | --- | --- | --- |
| [Liyama](https://www.ldlc.com/fiche/PB00442073.html) | 2 | 899€ | 1798€ |
| [Rock pi 4B+](https://www.amazon.fr/Rock-Pi-Plus-Model-Ordinateur/dp/B095LGKP5J/ref=sr_1_1?keywords=Rock+PI+X+Model+B&qid=1668431868&qu=eyJxc2MiOiIyLjczIiwicXNhIjoiMS4wMCIsInFzcCI6IjAuMDAifQ%3D%3D&sr=8-1) | 2 | 142,99€ | 285,98€ |
| [MicroSD](https://www.amazon.fr/Magix-M%C3%A9moire-MicroSD-Classe10-Adattatore/dp/B08F3WDQTJ/ref=sr_1_5?crid=1PE93WXAB0WQ5&keywords=micro+sd+card+16go&qid=1668440203&qu=eyJxc2MiOiI0LjMwIiwicXNhIjoiMy43NiIsInFzcCI6IjMuMjgifQ%3D%3D&sprefix=micro+sd+card+%2Caps%2C132&sr=8-5) | 2 | 6,40€ | 12,80€ |
| | | Total | 2096,78€ |

<br>

Secondly, you need to host your website that will allow you to control your screens and a database for MySQL (Here we use Microsoft Azure and we have a subscription cost about 6.55 per day)

<br>

### b. Security considerations

The security of the project is ensured by the use of [**Microsoft Azure**](#c-technical-requirements) which is a secure cloud computing service. The data is encrypted and the access to the database is limited to the administrator. The screens are also protected by a password.

<br>

### c. Accessibility considerations

The project is accessible to everyone. The screens are accessible to everyone and the website is accessible to everyone. The only thing that is not accessible to everyone is the database which is only accessible to the administrator.
<br>

### d. Risks

- There is the risk of losing the screens. Indeed, the screens are very expensive and if they are lost, the project will not work until it is replaced. 
- There is the risk of losing the SBC devices. Indeed, if the SBC devices are lost, the project will not work until it is replaced. 
- There is the risk of losing the website. Indeed, if the website is lost, the project will not work anymore. 
- There is the risk of losing the database. Indeed, if the database is lost, the project will not work anymore.

<br>

## 4. Success Evaluation

### a. Impact

The impact of the project is to allow the Jacobi Group to have a digital signage system that is easy to install and easy to use. Indeed, they will be able to install the screens in a few minutes and will be able to use the website to control the screens.  
<br>

### b. Metrics


<br>

## 5. Work

See the document Work Estimates and Timelines. <!-- ! add a link -->

<br>

## 6. Glossary

| Terms | Definitions |
| ----- | ----------- |
| [Web](https://www.w3.org/)| The Web is the term commonly used to refer to the World Wide Web, or WWW. It refers to the hypertext system operating on the global computer network Internet. |
| [Jacobi Group](https://www.jacobi.net/) | Jacobi is the first company to manufacture activated carbon from coconut shells. And it uses activated carbon and ion exchange resins in general in filtration and treatment (water, gas, metal, ...). |
| [I-video](https://i-video.fr/laffichage-dynamique-distanciel/) | I-video is a company that specializes in digital signage. |
| [Android](https://www.android.com/) | Android is a mobile operating system developed by Google. It is based on a modified version of the Linux kernel and other open source software, and is designed primarily for touchscreen mobile devices such as smartphones and tablets. |