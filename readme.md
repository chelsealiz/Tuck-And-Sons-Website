# VBTK Starter Theme

Based on http://jointswp.com/


UPDATE 2/20/17: ACF is now being saved into files in the theme and we have disabled the ability to modify Custom Fields unless a constant is set in the config file. To allow this, add `define('WP_LOCAL',true);` to your local wp-config.php


## Installation:
#### Step 1
_(This step is global, once you have this done you can skip this step.)_ 

- Install NodeJS and npm nodejs.org if you do not have this. 
- Then make sure you have `bower`, `npm` and `gulp` installed globally

```
npm install -g npm bower gulp
```

#### Step 2
Install all bower and npm modules. 

```
cd /your-local-path-here/starter-theme-2015/wp-content/themes/vbtk-starter
npm install
bower install
```

NOTE: `bower_components` and `node_modules` are NOT saved in the repository. There should be no need to do this.

#### Step 3
Setup your local URL for and database for this theme. Once you have a URL (ie: starter.dev), plug this into `starter-theme-2015/wp-content/themes/vbtk-starter/gulpfile.js`

```
var proxy_url = 'starter.dev';  // REPLACE THIS WITH YOUR LOCAL DEV URL
```

#### Step 4
From inside the theme directory, run `gulp dev`


***


### Prebuilt Gulp Commands

- **`gulp sass`** : Compiles `library/scss/style.scss` and puts minified style sheet into the build folder
- **`gulp script`** : Minifies `library/js/scripts.js` and puts the output script file into the build folder
- **`gulp bower`** : Concatenates all js files listed in the `bower_files` array in gulpfile.js and puts minified script file into the build folder
- **`gulp fonts`** : Collects all font files listed in the `fonts` array in gulpfile.js and puts them into the build folder
- **`gulp dev`** : Runs all of the above with BrowserSync, as watches style changes, js changes and php changes within the theme. 
    - Note: You must have the correct `proxy_url` setup in the gulpfile.js, see **Step 3**
- **`gulp production`** : Same as dev but does not launch BrowserSync or continue to watch. Just prepares files for production.


***


#### Installing new Bower & NPM components:
For Bower Components: https://bower.io/search/

```
bower install --save component-name-here
```

For NPM Components: https://www.npmjs.com/

```
npm install --save component-name-here
```

**\* NOTE: When installing Bower & NPM components, be sure you are inside the theme directory**

Once you have installed a new component:

- For JS: From within the gulpfile.js, you can add the production file path to the `bower_files` array and run `gulp bower` to regenerate the concatenated build file containing all of your bower components.
- For CSS / SCSS: Add the necessary path to the `library/scss/style.scss` file to be compiled with the theme sass styles.
- For fonts: From within the gulpfile.js, you can add the path to the fonts in the bower/npm component to the `fonts` array and run `gulp fonts` to copy the necessary fonts to the build directory.