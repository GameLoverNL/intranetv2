# Intranet V2 development

## Project information
    
- ### Author
    - This project has been made by Jorian (me), you can find more about me on my [GitHub](https://github.com/GameLoverNL) page

    
- ### Why I made this
    For a lot of roleplaying communities (Roblox, FiveM and others) that are starting out, or are just looking for free things to make their roleplaying-experience be better, there aren't that much free tools or websites online that are offering what these servers need. I don't like paying for things like scripts and other software for a server or something else which I'm just doing for fun. I want to create something that a lot of people can work with, that's easy to use and understand, and configure to their own needs. I hope this project can offer just a little bit of the feel and functionality which you get when you pay for it, the only thing I want to change is that I just want to do it *for free*, and I hope people can enjoy.

- ### Important notes
    - #### Contact information
        - You can join our [Discord]() server for any questions you might have about installation, usage or maybe you have some feedback or suggestions which can be added to improve the project, one important note on this; **this is made in my free time, and I do not guarantee any support or that I will add things**

    - #### Licensing
        - This project is licensed under the MIT license, you can read more about the license in the `LICENSE.md` file

- ### Packages used
    - This project has been made using [Laravel](https://laravel.com/).
        <!-- * For this section, something like `spatie/markdown` should be mentioned with a link to the spatie or Github page, this rule applies for all other packages used (can also be a `packagist` link) -->
    
    - Other packages
        - [Laravel Scout](https://laravel.com/docs/10.x/scout)
        - [Meilisearch](https://www.meilisearch.com/)



## TODO

- ### Admin - User management
    - User editor
        - Form
            - Username (changeable) (*done*)
            - Email (changeable) (*done*)
            - Department (select from list) (*done*)
            - Create the form to edit user information and style it (*done*)
                - Switch the form and inputs over to components to easily re-use the form elements (*later stage*)
        - Password reset (*todo, later stage*)
            - Admins should be able to reset the password
                - Send the user a magic link to set up their new password
        - Deletion (*todo, later stage*)
            - Modal
                - Bugs
                    - Modal is looping in foreach
- ### Admin - Department management
    - Department editor
        - Department name (changeable) (*done*)
        - Manager | Select a member (with search) using a modal (*done*)
        - Member count | Total members of the department (*later also 1their function/role*) (*done, except for the increment*)
            - Should be added one every time someone gets added to the department, logic still needs to be figured out
        - Applications | On or off (checkbox/toggle) (*later stage*)
        - Optional: notify manager with an email that there have been made changes to the department

- ### Admin - Controllers
    - Controllers
        The department and user controller should be put in an admin folder for better organization. Then the other controllers can go into other folders and the organization will still be alright.

- ### Public service announcements
    - Base
        - PSA model, migration and basic showing
            - Belongs to a user (user has many)
            - Only show PSA to department members (auth()->user()->department == $psa->department (which is a foreignID to the department_id))
    - Usable functionality
        - Create a PSA as a department manager (link to department table) using markdown syntax (spatie/markdown)
        - Edit and delete PSA
    - Admin
        - Admin can change, edit and delete PSA's
- ### Specifics
    - Pagination (*done*)
        - Change the pagination so you can use both the user and department paginator at the same  time, see: (*done*)
        - [Laravel paginator docs](https://laravel.com/docs/10.x/pagination#multiple-paginator-instances-per-page)
        - This was stupid, it was just one function that had to be added to the paginate method (`withQueryString()`), but it works now :D

- ### Authorization
    - Profile
        - Link TeamSpeak identifier to intranet using TeamSpeak webquery
    - Discord
        - Link the user Discord account to the platform using the Socialite package

- ### Docker containerization
    All these images should be put into one `docker-compose` file to easily distribute and be able to setup a new website
    - MariaDB
        - Docker container command
            - `docker run -d -p <xxxx>:<xxxx> -e MARIADB_ROOT_PASSWORD=<password> -e MARIADB_USER=<username> --name <docker_container_name> mariadb:<version>`
    - Caddy/Nginx/Apache
    - Meilisearch
    - *Bitnami/laravel*

## Progress
*This section will give a list of all the things that have been done with the date and commit message*

- 27-07-2023
    - Added basic user functionality, you can now;
        - Show the user
        - Edit user information
            - Username
            - Email
        - Delete the user

- 28-07-2023
    - Small updates to the project
        - Added Laravel Scout, but this is not yet used

- 29-07-2023
    - Fixes to the models and database seeder
        - Finally fixed the annoying bug which was causing the database seeder to not be able to seed
            - I wanted to create a user that has a linked department, but from 2 different factories this was not really possible
            - Solution
                - The solution I used now might not be the best one, but it works!
                    - In the department factory, I've added a configure method which returns the factory after creation, this then takes in the user factory associated with the manager id for the department factory, finds the user with the manager_id and adds the department to the user model from the made department factory.
                    - Long story short; it now works :D
                - For more information, see the `Database/seeders/DatabaseSeeder.php` file, and the `Database/factories/DepartmentFactory.php` file. Here you can see the changes and how it works now.

- 09-08-2023
    - Bugfixes and preparation for search functions
        - Bugfixes
            - Pagination
                After a vacation, working a bit on the project, I was really annoyed with the user/department paginator on the admin dashboard not working together, but now it does :D.
        - New
            - Search
                - Models
                    - User and department models are now searchable using Laravel Scout with Meilisearch


- 13-08-2023
    - Department admin page
        - Added a member list to the department page, this way you'll be able to see all the members that are in that department, when you click the user you can see more information about them.
        - Bugs
            - Styling
                - There is still a weird issue with the styling, this still needs to be addressed. 
            - Logic
                - The member count is not correct because the seeder currently just fakes a number, this should be converted into counting the users that are added to the department.

- 14-08-2023
    - Livewire update
        - Added a search component to be able to add users to a department by opening a modal, searching for the user and selecting the user, the department id is currently set to 2, but this can be made dynamic when configuring the component to be used in the department and user editor.
    - Fun stuff
            - Added a flash message with Livewire, wow that was easy! Love it already!

- 15-08-2023
    - Department Editor
        - Livewire components
            Changed the component to work correctly with the department editor, also changed the styling a bit, manager can now be searched and selected and it works like a charm, some small things still need to be done, these can be found in the files with `TODO` tags.

- 17-08-2023
    - User editor
        - Livewire components
            Started changing the component to be able to search for departments and add the user to a department. The `dd` function is returning the correct value but the text inside the blade view is not showing correctly.
    - Department editor
        - Livewire components
            Works completely. You can select a manager and this is persisted inside the database. No issues for now, but will probably see some in a test session with others.
    - Fun
        Livewire's awesome, it just works. Easy to figure stuff out. Absolutely amazing! Have a nice day!

- 18-08-2023
    - User editor
        - Bugfix
            There was an issue with displaying the user department name `$user->department->name` (`function`). I accidentally put the `manager_id` in the `User` model for the primary key for the `belongsTo` relationship. Now this is fixed.
    - Progress notes
        - Admin user/department editors
            For this stage I'm quite happy with the result I got for the editors. They're working how they're intended to work and no further changes need to be made for now. In a later stage, there will be some more things added, like creating a new department, a new user and when the functionality is there; public service announcements.

- 19-08-2023
    - Public service announcements
        - Prepared the basic functionality, created the model, factory and migration and migrated the database. Also prepared the dashboard to display the posts but the controller still needs to be prepared.

- 12-09-2023
  - Public service announcements
    - Made the basic display for the announcements. It redirects to a page for the specific PSA to show the whole announcement. On the display page the maximum content is 256 characters.
