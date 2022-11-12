# Functional Specification

## Table of contents
- [Functional Specification](#functional-specification)
  - [Table of contents](#table-of-contents)
    - [Distribution](#distribution)
    - [Overview](#overview)
    - [Scenarios](#scenarios)
      - [1. Hervé](#1-hervé)
      - [2. Alan](#2-alan)
      - [3. Solange](#3-solange)
      - [4. Estelle](#4-estelle)
    - [Use case](#use-case)
    - [Risks and Assumptions](#risks-and-assumptions)
    - [Goals and non goals](#goals-and-non-goals)
    - [Development and environement and Requirements](#development-and-environement-and-requirements)

### Distribution

| PERSON | ROLE |
| :-: | :-: |
| Nicolas MIDA | Project Manager |
| Grégory PAGNOUX | Program Manager |
| Rémy CHARLES | Tech Leader |
| Audrey Telliez | Software Engineer |
| Pierre GORIN | Quality Assurance |
  
### Overview

Jacobi's[^1] company commissioned us to create a communication tool to centralize the information to be transmitted to all employees.

Currently, the company share and send the informations via different application like Team, Email or Yammer, but also with a paper display. However, these means of communication are too numerous and even outdated. The company would like to facilitate communication and make it more modern with the digital tools that exist.

Mr. Saeed, the CEO of the company in France, would like a simple and secure communication tool to honor these two key points that Jacobi represents.

### Scenarios
#### 1. Hervé
Hervé has been Jacobi's communications director for 10 years. He is a vigorous 52 year old man. He divorced his wife 3 years ago with whom he had two children, Jessica and Nathan.

He leaves Salbris, his home, and arrives at Jacobi for 7:15 am. He turns on the two screens in the factory and in the open space. Then he goes on his computer, on the administrator account of the site, then he chooses the "create" option and he sets each element of the scene (number of parts, widgets, text, image...) with the news of the day that his boss, Mr. Saeed, asked him to share with all the employees of the company the day before. Once the settings are complete, he saves the scene and shares it on both screens simultaneously.
Saving his scene will allow him to load it later if he wants to use it again and to modify it.
At 7:30 a.m., when all employees arrive at the plant, they can view the news directly.

#### 2. Alan
Alan is 36 years old, she is engaged to Estelle and they have a daughter named Amelia. Alan and Estelle leave for work together after dropping their daughter off at her parents-in-law's house in Foëcy, a few blocks from their home.

He arrives at the factory at 7:20 a.m., and leaves for his office. Hervé, his superior, left on vacation the day before and gave him the mission to share the scenes he had already created. He uses the administrator account and chooses the "load" option to load the scene he has to share today on both screens simultaneously.

#### 3. Solange
Solange is 42 years old and single. She lives in Vouzeron and has been working in Jacobi since those 20 years, after leaving her BTS communication.

She is Hervé’s right-hand man and yesterday he called her in an emergency. It has been three days since he went on vacation and there has been an amendment to the regulations regarding the plant employees. On the admin account, he asked her to share on the screen that is in the open-space, the scene already preparing by simply loading it, but by changing the image he had and she also corrected an error in the title that Hervé had committed. Then she had to create a new scene in which she would write the new company guidelines and regulations. Then she had to share this scene only on the screen that was in the factory.

#### 4. Estelle
Estelle is 39 years old, she is engaged to Alan and they have a daughter named Amelia. Alan and Estelle leave for work together after dropping their daughter off at her parents' house in Foëcy, a few blocks from their home.

She arrives at the factory at 7:20 a.m., puts on her work clothes and goes in front of the screen to find out about possible news.
On her post, Estelle has a computer you can, if she wishes, have a return of the screens on the same site that Hervé used to create the scene, but with a simple employee account.

### Use case
![use case](img/example.png)
### Risks and Assumptions

**the reglementation :**

### Goals and non goals

**Goals :**
- digitalise the communication
- make it easy to publish the content

**Non goals :**
- Do not use the screen for entertainment purposes

### Development and environement and Requirements

  - HTML[^2]
  - CSS [^3]
  - JS [^4]
  - Windows/MacOS on development

<!-- Glossary -->

[^1]: Jacobi
It's an air and water purification solutions company. The company is based in Vierzon since 1956.

[^2]: HTML (HyperText Markup Language)
We use this language to create a web page. It is the skeleton of the page. We write all the content as well as its structure.

[^3]: CSS (Cascading Style Sheets)
This language completes HTML. It allows to format and make more ergonomic the website. It is the flesh that embellishes the skeleton.

[^4]: JS (JavaScript)
It's an object-oriented scripting language. This means that we can make the elements that make up the website dynamic. It is the muscles and joints of the site.