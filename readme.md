Facebook-Connect
==============

This spark that extends Facebook-SDK PHP library.
Enables reading of $_GET parameter.
Override three methods: 

      getCode()   
      getSignedRequest()
      getLoginUrl($params = array())
   

Usage
------------

Save your appID and Secret in the '/sparks/facebook-connect/X.X.X/config/config.php'

In your controller:

    $this->load->spark('facebookconnect/X.X.X');


Example showing how to get the url authentication:     
    
    $this->facebookconnect->getLoginURL();

Other methods see: https://developers.facebook.com/docs/reference/php/

Default Scopes
--------------

      user_about_me, user_activities, user_likes, user_birthday, user_location, user_website, email, user_events, user_actions.music, user_groups, manage_pages

Use $this->facebookconnect->addScope($string) to add new scope.

Author
------

Jansen Felipe <contato@supliu.com.br>

License
-------

Facebook-Connect is released under the Apache License. 

Copyright [2013] [Jansen Felipe]

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
