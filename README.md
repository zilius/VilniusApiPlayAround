# VilniusApiPlayAround
Some sandboxing with Jquery, Symfony and Vilnius API

<h3>Prerequisites</h3>

1. Docker

2. Makefile support

FYI Developed in Ubuntu, instructions should be working for MacOS, can't guarantee for Windows, because docker there is complicated.


<h3>Launching the app</h3>

1. Clone the repository `https://github.com/zilius/VilniusApiPlayAround.git`

2. CD into dir

3. By default app uses `8100` on host machine for http connections. You can change these variables in `Makefile`

4. enter `Make init` command to build the project it will request for root password, to change project directory owner to non-root user `sudo chown -R $(USER):$(USER) $(WORK_DIR)` - this is the command that requests it (root password will be requested after composer install all dependencies)

5. `http://localhost:8100/` in your borwser. If you see navbar on top, it means that everything works.

FYI `make ssh` command for entering the container bash


<h3>User guide</h3>

<b>1. get all information available in API by date interval (service_date_from and service_date_to) using API /api/waste-managment/container-service/</b>

Click on `Containers` on the navbar then, select the range you want to receive data from and click `Search`. By default each page has 20 records. Feel free to use paginatio.

<b>2.get specific container information (available in API) by “container_code” using API /api/waste-managment/container-service/</b>
You can either click on href in `Containers` on `konteinerio_kodas` column or enter `Container` in navigation and type Container Code manually, data is paginated as well. FYI if container is not found, view stays identical (no info messages about, same with 1st option)



<h3> Windows instalation </h3>

Prerequisites:

1. XAMPP
2. Composer

Instalation:

1. Clone the repository `git clone https://github.com/zilius/VilniusApiPlayAround.git` to {xamp-dir}/ (by default it shoud be `C:\xampp\htdocs`)
2. Install composer dependencies `cd VilniusApiPlayAround` and `composer install`
3. Open XAMPP and click `Start` on `Apache`
4. After apache starts visit `http://localhost:8080/VilniusApiPlayAround/public/index.php/` (I use custom 8080 apache port so also try `http://localhost/VilniusApiPlayAround/public/index.php/`)

