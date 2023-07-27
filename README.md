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



## TODO

- ### Admin - User management
    - Create the form to edit user information and style it
        - Switch the form and inputs over to components to easily re-use the form elements
- ### Admin - Department management
    - Department editor
        - Department name (changeable)
        - Manager | Select a member (with search) using a modal
        - Member count | Total members of the department (*later also their function/role*)
        - Applications | On or off (checkbox/toggle)
        - Optional: notify manager with an email that there have been made changes to the department

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
    - Pagination
        - Change the pagination so you can use both the user and department paginator at the same  time, see:
        - [Laravel paginator docs](https://laravel.com/docs/10.x/pagination#multiple-paginator-instances-per-page)

- ### Docker containerization
    - Postgres
    - Caddy/Nginx/Apache
    - *Bitnami/laravel*

