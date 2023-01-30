## Make clone to project
```
git clone https://github.com/ashrafmoselay/alwarsha.git
```

## Go inside the project
```
cd  alwarsha
```

## Create database
* copy .env.example and rename it to .env
* set database config in your inv file

## Install composer
```
composer install --ignore-platform-reqs

```

## Create key
```
php artisan key:generate
```

## Install npm and build assets
```
npm install && npm run dev
```

## Generat data
```
php artisan migrate --seed
```

## Run project
```
php artisan queue:work
php artisan storage:link
php artisan serve
```



<b>6- Settings for site</b>
* autoload setting in cache when site use it all time like [site name / logo / audios for notifications and alarms] </p>
* can close setting if you won't use it again </p>


<b>7- Create / Update Setting Form</b>
- after select content type, will show input with selected type </p>


<b>9- Menu</b>
##### - full controll on menu :
* drag and drop.
* close tap or specific link, to can't anyone open page. [only super admin role can open page]
* reorder.
* create / update / delete
* can update menu seeder and click on sync menus button will update menu 

<b>10- Roles</b>

<b>11- Assign Routes To Roles</b>
- select controller to list his methods. </p>
- when input is check for route in role, then role can use this route </p>

<b>12- ease to search in relations table using yajra datatable</p>

<b>13- ease to make your custom search</b>

- just create route like this [change users word and controller name]
```
    Route::get('{users}/search/form', '{UserController}@search')->name('{users}.search.form');
```
- in {users} folder add `` search.blade.php `` have only inputs without form tag 
- in Model have scopeFilter in this scope can add all your form conditions

<p>14- Email System</p>

<p>15- Languages</p>
- An easy way to active or disabled a language

<p>16- New page to list lang files</p>
- can create or edit for language file keys


## features

#### 1- on each controller have 3 properties</p>
* use_form_ajax => if true, form create / update will submit using ajax and display validation errors if have, after success will redirect to any page you set it on store method</p>
* use_button_ajax => if true, link create and update and delete will use ajax [ the form will open in modal ]</p>
* full_page_ajax or make use_form_ajax && use_button_ajax is true, open form and submit will do in the same page, no have redirect </p>

#### 2- have command to create
- Model with relations & fillable & scope filter and slug method to display the row name in breadcrumb section
- Request class with all validations and attributs translation
- Datatable class with load relations & columns & multidelete / create buttons
- Service class to handle create / update
- Controller with some method
- append translation columns in translation files
- append routes in route file
- create new menu for new model
- create form blade with all inputs from fillable


### Use Command
##### 1- create your migration table and make migrate </p>
<b> some Notes: </b>
- to create translation column with type json, please add comment ('translations')
- to create input image in form add comment ('image') for the column
- to create input video in form add comment ('video') for the column
- to create input audio in form add comment ('audio') for the column
- to create input file in form add comment ('file') for the column

###

#### 2- run this command
```
php artisan make:crud table_name
```
###### and can append all created file in specific new dir, use this argument '--namespace=New'
###### will append to namespace for class the namespace argument

