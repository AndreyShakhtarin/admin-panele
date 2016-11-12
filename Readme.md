/                                       
                                            Admin panel
                                            
                                  The structure of the MVC application. The main folder where all apps that libconrt - supervisors-driven pages, 
                                  and checks the authentication as the super user, libdb - folder where the database connection,
                                  fetching users, write and other requests to the database. Folder libview - it stores pages, styles, html files.          
                                           
                                           In detail about the directories ad files.
                                  config
                                           configConst
                                                      configConst.php---------> database configuration and connection of style files (css, js)
                                                                                in this file, locate the connection settings to the database
                                                                                and configure it for yourself
                                                                                ////////////////////////////////////
                                                                                //    const Driver = "mysql";     //
                                                                                //    const Host  = "localhost";  //
                                                                                //    const Name  = "admin_panel";// 
                                                                                //    const User  = "root";       //
                                                                                //   const Pass  = "123456";      //
                                           db_mysql                             ////////////////////////////////////
                                                     admin_panel.sql----------> Dump mysql import in you database
                                  libcontr------------------------------------> Files machining Association between a user and its presentation
                                          AuthController---------------------->  Controllers handle authentication
                                                        Cleaner--------------->  Cleans up requests from users
                                                        Cleaner.php ->  Class Cleaner - cleans user requests from the spaces and tags.
                                                        ModifDate------------->  Creates a time format
                                                        ModifDate.php>  Class ModifDate modifies the resulting date-time to timestamp
                                                        AuthController.php---->  Class AuthController authenticates user
                                                        CheckController.php--->  CheckController class processes the user request. 
                                                                                 A helper class helps you to handle date and user requests
                                  
                                          PageController---------------------->  The folder which contains the classes responsible 
                                                                                 for providing data to the user
                                                        CommsController.php--->  The class handles the connection page views
                                                        NavigationController.php Class navigation pages
                                                        PageController.php---->  So the class handles the connection page views   
                                  libdb                                          
                                       ConnectDB
                                                 ConnectDB.php --------------------> Connect with database
                                       QueriesDB
                                                 QueriesDB.php --------------------> Query from Admin
                                  
                                  libView
                                         Resource
                                                 page-------------------------------->pages admin panel     
                                                          preview-------------------->Folder which contains php scripts build view admin panel
                                                                 session------------->the persistent action of the administrator
                                                                        create.php
                                                                        no_crete.php
                                                                        update.php
                                                                 edit.php
                                                                 layout.php
                                                                 pagenavigation.php
                                                                 pages.php
                                                                 remove.php
                                                                 show.php
                                                                 table.php 
                                                          auth_admin.php
                                                          clean_post.php
                                                          create.php
                                                          edit.php
                                                          remove.php
                                                          show.php
                                                          success.php
                                                          table.php
                                                 redaction-------------------------->saved, deleted, updated, user
                                                          create.php
                                                          remove.php
                                                          update.php
                                                 layout.php-------------------------> main page view
                                  web-----------------------------------------------> files css, js, bootstrap 
                                  autoload.php--------------------------------------> Loading Class
                                  index.php             
                                               