<!DOCTYPE html>
<html>
<head>
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <style>
      body {background-color:#1976d2}
      input[type="search"] {
      -webkit-box-sizing: content-box;
      -moz-box-sizing: content-box;
      box-sizing: content-box;
      -webkit-appearance: searchfield;
      }

      input[type="search"]::-webkit-search-cancel-button {
      -webkit-appearance: searchfield-cancel-button;
      }

      .v-label{
        width: 150px;
      }
      label{
        
        cursor: pointer;
        
      }
      input[type="checkbox"]{
        display:none;
      }
      [type="checkbox"] + span{
        display: inline-block;
        padding: 1em;
        width: 200px;
        border: solid 1px black;
        margin: 20px;
        border-radius: 80px;
      }
      :checked + span{
        background: lightblue;
      }
      
  

    </style>
</head>


<body>
    <div style="text-align: center; background-color: #1976d2">
  <div id="app" style="width: 80%; height:90%; margin-top: 50px; display:inline-block; background-color:#1976d2">
    <v-app style="height: 80%; background-color:#1976d2">
      
            <v-stepper v-model="e1" alt-labels>
                    <!-- Set up header for stepper, check for color changes-->
                    <v-stepper-header>                      
                                 
                      <v-stepper-step :complete="e1 > 1" step="1">Channels</v-stepper-step>

                      <v-divider></v-divider>

                      <v-stepper-step step="2">Services</v-stepper-step>

                    </v-stepper-header>
                     
                    
                     
                      <!-- Step 1; Channel selection to compare to services. -->
                      <v-stepper-content step="1">
                          <h3>Add Channels That You Want:</h3>
                          <v-card class="mb-5" color="white" height="80%" style="min-height:500px">
                            <input type="search" v-model="searchBar" placeholder="Search Channel" style="width:400px; padding: 12px 20px; margin-top: 30px; box-sizing: border-box; border: 2px solid;"><br>
                            <v-btn color="primary" @click="clearSelected()" style="margin:15px">Clear Selected Channels</v-btn>
                            <v-container fluid width="80%">
                              <v-layout row wrap style="justify-content: center; height: 450px; overflow-y:auto">
                                <div  v-for="channel in filteredChans">
                                  
                                  <label class="checklabel"><input class="checky" type="checkbox" v-model="choiceChan" :key="channel" :value="channel" :label="channel"><span>@{{ channel }}</span></label>
                                </div>
                              </v-layout>  
                            </v-container>
                          </v-card>
                        
                        <v-btn color="primary" @click="e1 = 2">Services</v-btn>
                                        
                      </v-stepper-content>

                      <!-- Step 2: Display results according to best channel match -->
                      <v-stepper-content step="2">
                        <v-card class="mb-5" color="white" min-height="500px" flat >
                          <h2>Services</h2>
                            <v-tabs background-color="blue" slider-color="orange" grow>
                                <v-tab ripple>Sling<br>@{{compareOrange().length}} / @{{compareBlue().length}} / @{{compareOrablu().length}}</v-tab>
                                <v-tab ripple>PS Vue<br>@{{comparePSAccess().length}} / @{{comparePSCore().length}} / @{{comparePSElite().length}} / @{{comparePSUltra().length}}</v-tab>
                                <v-tab ripple>AT&T NOW<br>@{{compareDir1().length}} / @{{compareDir2().length}} / @{{compareDir3().length}} / @{{compareDir4().length}} / @{{compareDir5().length}} / @{{compareDir6().length}}</v-tab>
                                <v-tab ripple>Hulu<br>@{{compareHulu().length}}</v-tab>
                                <v-tab ripple>YouTube<br>@{{compareYoutube().length}}</v-tab>
                                <v-tab ripple>Philo<br>@{{comparePhilo1().length}}</v-tab>
                                <v-tab ripple>Fubo<br>@{{compareFubo1().length}} / @{{compareFubo2().length}}</v-tab>
                                <v-tab ripple>AT&T Watch<br>@{{compareATT().length}}</v-tab>


                               <!--Sling-->
                               <v-tab-item>
                                    <v-container fluid center-align justify-center>
                                      <v-layout xs4 row center-align justify-center>
                                        <!--Sling Orange-->
                                        <v-card style="margin: 10px" width="250px" min-height="400px">
                                          <h2>Sling Orange</h2>  <!-- Display Price and Name -->
                                          <h4>$25 /month</h4><br>
                                            <v-container v-if="compareOrange().length > 0"><!--Display if missing channel(s) -->
                                              <v-divider></v-divider>
                                              <h3>Missing Channels:</h3>
                                              <ul>
                                                    <li v-for="name in compareOrange()" :label="name" >@{{name}}</li>
                                                  </ul>
                                            </v-container>
                                            <v-container v-else><!-- Else display -->
                                              <v-divider></v-divider>
                                              <h3>No Missing Channels</h3>
                                            </v-container>
                                                  
                                                  <v-container v-if="starz().length > 0 || showtime().length > 0 || orangeKids().length > 0 || orangeSports().length > 0 || orangeComedy().length > 0 || orangeNews().length > 0 || orangeLife().length > 0 || slingHollywood().length > 0 || slingHeartland().length > 0">
                                                      <h3>Add-Ons Needed:</h3><br>
                                                      <ul v-if="orangeKids().length > 0">
                                                        <h4>Kids Extra($5):</h4>
                                                        <li v-for="name in orangeKids()" :label="name">@{{name}}</li>
                                                      </ul>
                                                      <ul v-if="orangeSports().length > 0">
                                                        <h4>Sports Extra($10):</h4>
                                                        <li v-for="name in orangeSports()" :label="name">@{{name}}</li>
                                                      </ul>
                                                      <ul v-if="orangeComedy().length > 0">
                                                          <h4>Comedy Extra($5):</h4>
                                                          <li v-for="name in orangeComedy()" :label="name">@{{name}}</li>
                                                      </ul>
                                                      <ul v-if="orangeNews().length > 0">
                                                            <h4>News Extra($5):</h4>
                                                            <li v-for="name in orangeNews()" :label="name">@{{name}}</li>
                                                      </ul>
                                                      <ul v-if="orangeLife().length > 0">
                                                          <h4>Lifestyle Extra($5):</h4>
                                                          <li v-for="name in orangeLife()" :label="name">@{{name}}</li>
                                                      </ul>
                                                      <ul v-if="slingHollywood().length > 0">
                                                          <h4>Hollywood Extra($5):</h4>
                                                          <li v-for="name in slingHollywood()" :label="name">@{{name}}</li>
                                                      </ul>
                                                      <ul v-if="slingHeartland().length > 0">
                                                          <h4>Heartland Extra($5):</h4>
                                                          <li v-for="name in slingHeartland()" :label="name">@{{name}}</li>
                                                      </ul>
                                                      <h4 v-if="showtime().length > 0">Showtime Add-on($10)</h4>
                                                      <h4 v-if="starz().length > 0">Starz Add-on($9)</h4>
                                                  </v-container>
                                                  <v-container>
                                                      <br><v-divider></v-divider>
                                                      <h3>Number of Streams:</h3><!--show number of streams -->
                                                      <h3>1 At A Time</h3>
                                                      
                                                      <br>
                                                      <h3>DVR Options:</h3>
                                                      <h3>50 Hours for $5</h3>
                                                      
                                                      <br>
                                                      <a href="https://www.sling.com/" target="_blank">More Info</a><!--Link for more info-->
                                                  </v-container>
                                        </v-card>

                                        <!--Sling Blue-->
                                        <v-card style="margin: 10px" width="250px" min-height="400px">
                                            <h2>Sling Blue</h2>  <!-- Display Price and Name -->
                                            <h4>$25 /month</h4><br>
                                            <v-container v-if="compareBlue().length > 0"><!--Display if missing channel(s) -->
                                              <v-divider></v-divider>
                                              <h3>Missing Channels:</h3>
                                                  <ul>
                                                    <li v-for="name in compareBlue()" :label="name" >@{{name}}</li>
                                                  </ul>
                                            </v-container>
                                            <v-container v-else><!-- Else display -->
                                              <v-divider></v-divider>
                                              <h3>No Missing Channels</h3>
                                            </v-container>

                                                <v-container v-if="starz().length > 0 || showtime().length > 0 || blueKids().length > 0 || blueSports().length > 0 || blueComedy().length > 0 || blueNews().length > 0 || blueLife().length > 0 || slingHollywood().length > 0 || slingHeartland().length > 0">
                                                  <h3>Add-Ons Needed:</h3><br>
                                                  <ul v-if="blueKids().length > 0">
                                                    <h4>Kids Extra($5):</h4>
                                                    <li v-for="name in blueKids()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="blueSports().length > 0">
                                                    <h4>Sports Extra($10):</h4>
                                                    <li v-for="name in blueSports()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="blueComedy().length > 0">
                                                      <h4>Comedy Extra($5):</h4>
                                                      <li v-for="name in blueComedy()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="blueNews().length > 0">
                                                        <h4>News Extra($5):</h4>
                                                        <li v-for="name in blueNews()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="blueLife().length > 0">
                                                      <h4>Lifestyle Extra($5):</h4>
                                                      <li v-for="name in blueLife()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="slingHollywood().length > 0">
                                                      <h4>Hollywood Extra($5):</h4>
                                                      <li v-for="name in slingHollywood()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="slingHeartland().length > 0">
                                                      <h4>Heartland Extra($5):</h4>
                                                      <li v-for="name in slingHeartland()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <h4 v-if="showtime().length > 0">Showtime Add-on($10)</h4>
                                                  <h4 v-if="starz().length > 0">Starz Add-on($9)</h4>
                                                </v-container>
                                            
                                            <v-container>
                                            <br><v-divider></v-divider>
                                            <h3>Number of Streams:</h3><!--show number of streams -->
                                            <h3>3 at Once</h3>
                                            
                                            <br>
                                            <h3>DVR Options:</h3>
                                            <h3>50 Hours for $5</h3>
                                            
                                            <br>
                                            <a href="https://www.sling.com/" target="_blank">More Info</a><!--Link for more info-->
                                            </v-container>
                                        </v-card>

                                        <!--Sling Orange + Blue-->
                                        <v-card style="margin: 10px" width="250px" min-height="400px">
                                            <h2>Sling Orange+Blue</h2>  <!-- Display Price and Name -->
                                            <h4>$40 /month</h4><br>
                                            <v-container v-if="compareOrablu().length > 0"><!--Display if missing channel(s) -->
                                              <v-divider></v-divider>
                                              <h3>Missing Channels:</h3>
                                                  <ul>
                                                    <li v-for="name in compareOrablu()" :label="name" >@{{name}}</li>
                                                  </ul>
                                            </v-container>
                                            <v-container v-else><!-- Else display -->
                                              <v-divider></v-divider>
                                              <h3>No Missing Channels</h3>
                                            </v-container>

                                                <v-container v-if="starz().length > 0 || showtime().length > 0 || obKids().length > 0 || obSports().length > 0 || obComedy().length > 0 || obNews().length > 0 || obLife().length > 0 || slingHollywood().length > 0 || slingHeartland().length > 0">
                                                  <h3>Add-Ons Needed:</h3><br>
                                                  <ul v-if="obKids().length > 0">
                                                    <h4>Kids Extra($5):</h4>
                                                    <li v-for="name in obKids()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="obSports().length > 0">
                                                    <h4>Sports Extra($10):</h4>
                                                    <li v-for="name in obSports()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="obComedy().length > 0">
                                                      <h4>Comedy Extra($5):</h4>
                                                      <li v-for="name in obComedy()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="obNews().length > 0">
                                                        <h4>News Extra($5):</h4>
                                                        <li v-for="name in obNews()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="obLife().length > 0">
                                                      <h4>Lifestyle Extra($5):</h4>
                                                      <li v-for="name in obLife()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="slingHollywood().length > 0">
                                                      <h4>Hollywood Extra($5):</h4>
                                                      <li v-for="name in slingHollywood()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <ul v-if="slingHeartland().length > 0">
                                                      <h4>Heartland Extra($5):</h4>
                                                      <li v-for="name in slingHeartland()" :label="name">@{{name}}</li>
                                                  </ul>
                                                  <h4 v-if="showtime().length > 0">Showtime Add-on($10)</h4>
                                                  <h4 v-if="starz().length > 0">Starz Add-on($9)</h4>
                                                </v-container>                                   
                                            
                                            
                                            <v-container>
                                            <br><v-divider></v-divider>
                                            <h3>Number of Streams:</h3><!--show number of streams -->
                                            <h3>3 Blue + 1 Orange Channels at Once</h3>
                                            
                                            <br>
                                            <h3>DVR Options:</h3>
                                            <h3>50 Hours for $5</h3>
                                            
                                            <br>
                                            <v-container v-if="singleStream().length > 0">
                                                <p>Please note that these chosen channels can only be streamed on one screen at a time:</p>
                                                <ul>
                                                  <li v-for="name in singleStream()" :label="name">@{{name}}</li>
                                                </ul>
                                              </v-container>
                                              <br>
                                            <a href="https://www.sling.com/" target="_blank">More Info</a><!--Link for more info-->
                                            </v-container>
                                        </v-card>


                                      </v-layout>
                                    </v-container>
                               </v-tab-item>

                              <!--PS Vue-->
                              <v-tab-item>
                                  <v-container fluid center-align justify-center>
                                      <v-layout xs4 row center-align justify-center>
                                        <!--PS Vue Access-->
                                      <v-card style="margin: 10px" width="250px" min-height="400px">
                                          <h2>Playstation Vue Access</h2><!-- Display Price and Name -->
                                          <h4>$50 /month</h4><br>
                                          <v-container v-if="comparePSAccess().length > 0"><!--Display if missing channel(s) -->
                                            <v-divider></v-divider>
                                            <h3>Missing Channels:</h3>
                                                <ul>
                                                  <li v-for="name in comparePSAccess()" :label="name" >@{{name}}</li>
                                                </ul>
                                          </v-container>
                                          <v-container v-else><!-- Else display -->
                                            <v-divider></v-divider>
                                            <h3>No Missing Channels</h3>
                                          </v-container>
                                          <v-container v-if="hbo().length > 0 || showtime().length > 0 || cinemax().length > 0">
                                            <h3>Add-Ons Needed:</h3>                                            
                                            <h4 v-if="hbo().length > 0">HBO Add-on($15)</h4>                          
                                            <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                            <h4 v-if="cinemax().length > 0">Cinemax Add-on($15)</h4>                                              
                                          </v-container>
                                          <v-container>
                                          <br><v-divider></v-divider>
                                          <h3>Number of Streams:</h3><!--show number of streams -->
                                          <h3>5 At Once</h3>
                                          <br>
                                          <h3>DVR Options:</h3>
                                          <h3>Unlimited Cloud Storage</h3>
                                          <p>**Recordings stay for 28 days</p>
                                          <br>
                                          <a href="https://www.playstation.com/en-us/network/vue/
                                          " target="_blank">More Info</a><!--Link for more info-->
                                          </v-container>
                                      </v-card>

                                      <!--PS Vue Core-->
                                      <v-card style="margin: 10px" width="250px" min-height="400px">
                                          <h2>Playstation Vue Core</h2><!-- Display Price and Name -->
                                          <h4>$55 /month</h4><br>
                                          <v-container v-if="comparePSCore().length > 0"><!--Display if missing channel(s) -->
                                            <v-divider></v-divider>
                                            <h3>Missing Channels:</h3>
                                                <ul>
                                                  <li v-for="name in comparePSCore()" :label="name" >@{{name}}</li>
                                                </ul>
                                          </v-container>
                                          <v-container v-else><!-- Else display -->
                                            <v-divider></v-divider>
                                            <h3>No Missing Channels</h3>
                                          </v-container>
                                          <v-container v-if="hbo().length > 0 || showtime().length > 0 || cinemax().length > 0">
                                              <h3>Add-Ons Needed:</h3>                                            
                                              <h4 v-if="hbo().length > 0">HBO Add-on($15)</h4>                          
                                              <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                              <h4 v-if="cinemax().length > 0">Cinemax Add-on($15)</h4>                                              
                                            </v-container>
                                          <v-container>
                                          <br><v-divider></v-divider>
                                          <h3>Number of Streams:</h3><!--show number of streams -->
                                          <h3>5 At Once</h3>
                                          <br>
                                          <h3>DVR Options:</h3>
                                          <h3>Unlimited Cloud Storage</h3>
                                          <p>**Recordings stay for 28 days</p>
                                          <br>
                                          <a href="https://www.playstation.com/en-us/network/vue/" target="_blank">More Info</a><!--Link for more info-->
                                          </v-container>
                                      </v-card>

                                    <!--PS Vue Elite-->
                                    <v-card style="margin: 10px" width="250px" min-height="400px">
                                        <h2>Playstation Vue Elite</h2><!-- Display Price and Name -->
                                        <h4>$65 /month</h4><br>
                                        <v-container v-if="comparePSElite().length > 0"><!--Display if missing channel(s) -->
                                          <v-divider></v-divider>
                                          <h3>Missing Channels:</h3>
                                              <ul>
                                                <li v-for="name in comparePSElite()" :label="name" >@{{name}}</li>
                                              </ul>
                                        </v-container>
                                        <v-container v-else><!-- Else display -->
                                          <v-divider></v-divider>
                                          <h3>No Missing Channels</h3>
                                        </v-container>
                                        <v-container v-if="hbo().length > 0 || showtime().length > 0 || cinemax().length > 0">
                                            <h3>Add-Ons Needed:</h3>                                            
                                            <h4 v-if="hbo().length > 0">HBO Add-on($15)</h4>                          
                                            <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>   
                                            <h4 v-if="cinemax().length > 0">Cinemax Add-on($15)</h4>                                           
                                          </v-container>
                                        <v-container>
                                        <br><v-divider></v-divider>
                                        <h3>Number of Streams:</h3><!--show number of streams -->
                                        <h3>5 At Once</h3>
                                        <br>
                                        <h3>DVR Options:</h3>
                                        <h3>Unlimited Cloud Storage</h3>
                                        <p>**Recordings stay for 28 days</p>
                                        <br>
                                        <a href="https://www.playstation.com/en-us/network/vue/" target="_blank">More Info</a><!--Link for more info-->
                                        </v-container>
                                    </v-card>

                                    <!--PS Vue Ultra-->
                                    <v-card style="margin: 10px" width="250px" min-height="400px">
                                        <h2>Playstation Vue Ultra</h2><!-- Display Price and Name -->
                                        <h4>$85 /month</h4><br>
                                        <v-container v-if="comparePSUltra().length > 0"><!--Display if missing channel(s) -->
                                          <v-divider></v-divider>
                                          <h3>Missing Channels:</h3>
                                              <ul>
                                                <li v-for="name in comparePSUltra()" :label="name" >@{{name}}</li>
                                              </ul>
                                        </v-container>
                                        <v-container v-else><!-- Else display -->
                                          <v-divider></v-divider>
                                          <h3>No Missing Channels</h3>
                                        </v-container>
                                        <v-container v-if="cinemax().length > 0">
                                          <h3>Add-Ons Needed:</h3>                                            
                                          <h4 v-if="cinemax().length > 0">Cinemax Add-on($15)</h4>                                                                                     
                                        </v-container>
                                        <v-container>
                                        <br><v-divider></v-divider>
                                        <h3>Number of Streams:</h3><!--show number of streams -->
                                        <h3>5 At Once</h3>
                                        <br>
                                        <h3>DVR Options:</h3>
                                        <h3>Unlimited Cloud Storage</h3>
                                        <p>**Recordings stay for 28 days</p>
                                        <br>
                                        <a href="https://www.playstation.com/en-us/network/vue/" target="_blank">More Info</a><!--Link for more info-->
                                        </v-container>
                                    </v-card>
                                      </v-layout>
                                  </v-container>

                              </v-tab-item>

                              <!--AT&T TV Now-->
                              <v-tab-item>
                                  <v-container fluid center-align justify-center>
                                      <v-layout xs4 row center-align justify-center>
                                    <!--AT&T TV Now 1-->
                                    <v-card style="margin: 10px" width="250px" min-height="400px">
                                        <h2>AT&T TV NOW</h2>
                                        <h3>"Plus"</h3><!-- Display Price and Name -->
                                        <h4>$50 /month</h4><br>
                                        <v-container v-if="compareDir1().length > 0"><!--Display if missing channel(s) -->
                                          <v-divider></v-divider>
                                          <h3>Missing Channels:</h3>
                                              <ul>
                                                <li v-for="name in compareDir1()" :label="name" >@{{name}}</li>
                                              </ul>
                                        </v-container>
                                        <v-container v-else><!-- Else display -->
                                          <v-divider></v-divider>
                                          <h3>No Missing Channels</h3>
                                        </v-container>
                                        <v-container v-if="hbo().length > 0 || showtime().length > 0 || cinemax().length > 0 || starz().length > 0">
                                          <h3>Add-Ons Needed:</h3>                                            
                                          <h4 v-if="hbo().length > 0">HBO Included</h4>                          
                                          <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                          <h4 v-if="cinemax().length > 0">Cinemax Add-on($11)</h4>  
                                          <h4 v-if="starz().length > 0">Starz Add-on($11)</h4>                                            
                                        </v-container>
                                        <v-container>
                                        <br><v-divider></v-divider>
                                        <h3>Number of Streams:</h3><!--show number of streams -->
                                        <h3>2 At Once</h3>
                                        <p>**Add a 3rd for $5</p>
                                        <br>
                                        <h3>DVR Options:</h3>
                                        <h3>20 Hours of Cloud DVR</h3>
                                        <p>**Recordings stay for 30 days</p>
                                        <br>
                                        <a href="https://www.directvnow.com/thegoodstuff2?aa_ref=blank" target="_blank">More Info</a><!--Link for more info-->
                                        </v-container>
                                    </v-card>

                                    <!--AT&T TV Now 2-->
                                    <v-card style="margin: 10px" width="250px" min-height="400px">
                                        <h2>AT&T TV NOW</h2>
                                        <h3>"Max"</h3><!-- Display Price and Name -->
                                        <h4>$70 /month</h4><br>
                                        <v-container v-if="compareDir2().length > 0"><!--Display if missing channel(s) -->
                                          <v-divider></v-divider>
                                          <h3>Missing Channels:</h3>
                                              <ul>
                                                <li v-for="name in compareDir2()" :label="name" >@{{name}}</li>
                                              </ul>
                                        </v-container>
                                        <v-container v-else><!-- Else display -->
                                          <v-divider></v-divider>
                                          <h3>No Missing Channels</h3>
                                        </v-container>
                                        <v-container v-if="hbo().length > 0 || showtime().length > 0 || cinemax().length > 0 || starz().length > 0">
                                          <h3>Add-Ons Needed:</h3>                                            
                                          <h4 v-if="hbo().length > 0">HBO Included</h4>                          
                                          <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                          <h4 v-if="cinemax().length > 0">Cinemax Included</h4>  
                                          <h4 v-if="starz().length > 0">Starz Add-on($11)</h4>                                            
                                        </v-container>
                                        <v-container>
                                        <br><v-divider></v-divider>
                                        <h3>Number of Streams:</h3><!--show number of streams -->
                                        <h3>2 At Once</h3>
                                        <p>**Add a 3rd for $5</p>
                                        <br>
                                        <h3>DVR Options:</h3>
                                        <h3>20 Hours of Cloud DVR</h3>
                                        <p>**Recordings stay for 30 days</p>
                                        <br>
                                        <a href="https://www.directvnow.com/thegoodstuff2?aa_ref=blank" target="_blank">More Info</a><!--Link for more info-->
                                        </v-container>
                                    </v-card>

                                    <!--AT&T TV Now 3-->
                                    <v-card style="margin: 10px" width="250px" min-height="400px">
                                        <h2>AT&T TV NOW</h2>
                                        <h3>"Entertainment"</h3><!-- Display Price and Name -->
                                        <h4>$93 /month</h4><br>
                                        <v-container v-if="compareDir3().length > 0"><!--Display if missing channel(s) -->
                                          <v-divider></v-divider>
                                          <h3>Missing Channels:</h3>
                                              <ul>
                                                <li v-for="name in compareDir3()" :label="name" >@{{name}}</li>
                                              </ul>
                                        </v-container>
                                        <v-container v-else><!-- Else display -->
                                          <v-divider></v-divider>
                                          <h3>No Missing Channels</h3>
                                        </v-container>
                                        <v-container v-if="hbo().length > 0 || showtime().length > 0 || cinemax().length > 0 || starz().length > 0">
                                          <h3>Add-Ons Needed:</h3>                                            
                                          <h4 v-if="hbo().length > 0">HBO Add-on($11)</h4>                          
                                          <h4 v-if="showtime().length > 0">Showtime Add-on($1)</h4>
                                          <h4 v-if="cinemax().length > 0">Cinemax Add-on($11)</h4>  
                                          <h4 v-if="starz().length > 0">Starz Add-on($11)</h4>                                            
                                        </v-container>
                                        <v-container>
                                        <br><v-divider></v-divider>
                                        <h3>Number of Streams:</h3><!--show number of streams -->
                                        <h3>2 At Once</h3>
                                        <p>**Add a 3rd for $5</p>
                                        <br>
                                        <h3>DVR Options:</h3>
                                        <h3>20 Hours of Cloud DVR</h3>
                                        <p>**Recordings stay for 30 days</p>
                                        <br>
                                        <a href="https://www.directvnow.com/thegoodstuff2?aa_ref=blank" target="_blank">More Info</a><!--Link for more info-->
                                        </v-container>
                                    </v-card>

                                    <!--AT&T TV Now 4-->
                                    <v-card style="margin: 10px" width="250px" min-height="400px">
                                        <h2>AT&T TV NOW</h2>
                                        <h3>"Choice"</h3><!-- Display Price and Name -->
                                        <h4>$110 /month</h4><br>
                                        <v-container v-if="compareDir4().length > 0"><!--Display if missing channel(s) -->
                                          <v-divider></v-divider>
                                          <h3>Missing Channels:</h3>
                                              <ul>
                                                <li v-for="name in compareDir4()" :label="name" >@{{name}}</li>
                                              </ul>
                                        </v-container>
                                        <v-container v-else><!-- Else display -->
                                          <v-divider></v-divider>
                                          <h3>No Missing Channels</h3>
                                        </v-container>
                                        <v-container v-if="hbo().length > 0 || showtime().length > 0 || cinemax().length > 0 || starz().length > 0">
                                          <h3>Add-Ons Needed:</h3>                                            
                                          <h4 v-if="hbo().length > 0">HBO Add-on($11)</h4>                          
                                          <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                          <h4 v-if="cinemax().length > 0">Cinemax Add-on($11)</h4>  
                                          <h4 v-if="starz().length > 0">Starz Add-on($11)</h4>                                            
                                        </v-container>
                                        <v-container>
                                        <br><v-divider></v-divider>
                                        <h3>Number of Streams:</h3><!--show number of streams -->
                                        <h3>2 At Once</h3>
                                        <p>**Add a 3rd for $5</p>
                                        <br>
                                        <h3>DVR Options:</h3>
                                        <h3>20 Hours of Cloud DVR</h3>
                                        <p>**Recordings stay for 30 days</p>
                                        <br>
                                        <a href="https://www.directvnow.com/thegoodstuff2?aa_ref=blank" target="_blank">More Info</a><!--Link for more info-->
                                        </v-container>
                                    </v-card>

                                    <!--AT&T TV Now 5-->
                                    <v-card style="margin: 10px" width="250px" min-height="400px">
                                      <h2>AT&T TV NOW</h2>
                                      <h3>"Xtra"</h3><!-- Display Price and Name -->
                                      <h4>$124 /month</h4><br>
                                      <v-container v-if="compareDir5().length > 0"><!--Display if missing channel(s) -->
                                        <v-divider></v-divider>
                                        <h3>Missing Channels:</h3>
                                            <ul>
                                              <li v-for="name in compareDir5()" :label="name" >@{{name}}</li>
                                            </ul>
                                      </v-container>
                                      <v-container v-else><!-- Else display -->
                                        <v-divider></v-divider>
                                        <h3>No Missing Channels</h3>
                                      </v-container>
                                      <v-container v-if="hbo().length > 0 || showtime().length > 0 || cinemax().length > 0 || starz().length > 0">
                                        <h3>Add-Ons Needed:</h3>                                            
                                        <h4 v-if="hbo().length > 0">HBO Add-on($11)</h4>                          
                                        <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                        <h4 v-if="cinemax().length > 0">Cinemax Add-on($11)</h4>  
                                        <h4 v-if="starz().length > 0">Starz Add-on($11)</h4>                                            
                                      </v-container>
                                      <v-container>
                                      <br><v-divider></v-divider>
                                      <h3>Number of Streams:</h3><!--show number of streams -->
                                      <h3>2 At Once</h3>
                                      <p>**Add a 3rd for $5</p>
                                      <br>
                                      <h3>DVR Options:</h3>
                                      <h3>20 Hours of Cloud DVR</h3>
                                      <p>**Recordings stay for 30 days</p>
                                      <br>
                                      <a href="https://www.directvnow.com/thegoodstuff2?aa_ref=blank" target="_blank">More Info</a><!--Link for more info-->
                                      </v-container>
                                  </v-card>

                                   <!--AT&T TV Now 6-->
                                   <v-card style="margin: 10px" width="250px" min-height="400px">
                                    <h2>AT&T TV NOW</h2>
                                    <h3>"Ultimate"</h3><!-- Display Price and Name -->
                                    <h4>$135 /month</h4><br>
                                    <v-container v-if="compareDir6().length > 0"><!--Display if missing channel(s) -->
                                      <v-divider></v-divider>
                                      <h3>Missing Channels:</h3>
                                          <ul>
                                            <li v-for="name in compareDir6()" :label="name" >@{{name}}</li>
                                          </ul>
                                    </v-container>
                                    <v-container v-else><!-- Else display -->
                                      <v-divider></v-divider>
                                      <h3>No Missing Channels</h3>
                                    </v-container>
                                    <v-container v-if="hbo().length > 0 || showtime().length > 0 || cinemax().length > 0 || starz().length > 0">
                                      <h3>Add-Ons Needed:</h3>                                            
                                      <h4 v-if="hbo().length > 0">HBO Add-on($11)</h4>                          
                                      <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                      <h4 v-if="cinemax().length > 0">Cinemax Add-on($11)</h4>  
                                      <h4 v-if="starz().length > 0">Starz Included</h4>                                            
                                    </v-container>
                                    <v-container>
                                    <br><v-divider></v-divider>
                                    <h3>Number of Streams:</h3><!--show number of streams -->
                                    <h3>2 At Once</h3>
                                    <p>**Add a 3rd for $5</p>
                                    <br>
                                    <h3>DVR Options:</h3>
                                    <h3>20 Hours of Cloud DVR</h3>
                                    <p>**Recordings stay for 30 days</p>
                                    <br>
                                    <a href="https://www.directvnow.com/thegoodstuff2?aa_ref=blank" target="_blank">More Info</a><!--Link for more info-->
                                    </v-container>
                                </v-card>
                                      </v-layout>
                                  </v-container>

                              </v-tab-item>
                                
                              <!--HuluTV-->
                              <v-tab-item>
                                <v-container fluid center-align justify-center>
                                  <v-layout xs4 row center-align justify-center>
                                    <!-- Hulu TV Card -->
                                    <v-card style="margin: 10px" width="250px" min-height="450px">
                                      <h2>Hulu Live TV</h2><!-- Display Price and Name -->
                                      <h4>$45 /month</h4><br>
                                      <v-container v-if="compareHulu().length > 0"><!--Display if missing channel(s) -->
                                        <v-divider></v-divider>
                                        <h3>Missing Channels:</h3>
                                            <ul>
                                              <li v-for="name in compareHulu()" :label="name" >@{{name}}</li>
                                            </ul>
                                      </v-container>
                                      <v-container v-else><!-- Else display -->
                                        <v-divider></v-divider>
                                        <h3>No Missing Channels</h3>
                                      </v-container>
                                      <v-container v-if="hbo().length > 0 || showtime().length > 0 || cinemax().length > 0 || starz().length > 0 || huluEnt().length > 0">
                                        <h3>Add-Ons Needed:</h3>                                            
                                        <h4 v-if="hbo().length > 0">HBO Add-on($15)</h4>                          
                                        <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                        <h4 v-if="cinemax().length > 0">Cinemax Add-on($10)</h4> 
                                        <h4 v-if="starz().length > 0">Starz Add-on($9)</h4>
                                        <h4 v-if="huluEnt().length > 0">Entertainment Add-On($8) for:</h4>
                                        <ul>
                                          <li v-for="name in huluEnt()" :label="name">@{{name}}</li>
                                        </ul>
                                      </v-container> 
                                                 
                                      <br>
                                      <h3>Number of Streams:</h3><!--show number of streams -->
                                      <h3>2 At Once</h3>
                                      <p>**Unlimited available for $15/month</p>
                                      <br>
                                      <h3>DVR Options:</h3>
                                      <h3>50 Hours of Cloud DVR</h3>
                                      <p>200 Hours available for $15/month</p>
                                      <br>
                                      <a href="https://www.hulu.com/live-tv" target="_blank">More Info</a><!--Link for more info-->
                                    </v-card>
                                  </v-layout>
                                </v-container>
                                    
                              </v-tab-item>

                              <!--YouTube-->
                              <v-tab-item>
                                <v-container fluid center-align justify-center>
                                  <v-layout xs4 row center-align justify-center>
                                    <!-- Youtube TV Card -->
                                    <v-card style="margin: 10px" width="250px" min-height="450px">
                                      <h2>Youtube TV</h2><!-- Display Price and Name -->
                                      <h4>$50 /month</h4><br>
                                      <v-container v-if="compareYoutube().length > 0"><!--Display if missing channel(s) -->
                                        <v-divider></v-divider>
                                        <h3>Missing Channels:</h3>
                                            <ul>
                                              <li v-for="name in compareYoutube()" :label="name" >@{{name}}</li>
                                            </ul>
                                      </v-container>
                                      <v-container v-else><!-- Else display -->
                                        <v-divider></v-divider>
                                        <h3>No Missing Channels</h3>
                                      </v-container>
                                      <v-container v-if="showtime().length > 0 || starz().length > 0">
                                        <h3>Add-Ons Needed:</h3>                                            
                                        <h4 v-if="showtime().length > 0">Showtime Add-on($7)</h4>                           
                                        <h4 v-if="starz().length > 0">Starz Add-on($9)</h4>
                                        
                                      </v-container> 
                                                 
                                      <br>
                                      <h3>Number of Streams:</h3><!--show number of streams -->
                                      <h3>3 At Once</h3>
                                      <p></p>
                                      <br>
                                      <h3>DVR Options:</h3>
                                      <h3>Unlimited Cloud DVR</h3>
                                      <p></p>
                                      <br>
                                      <a href="https://tv.youtube.com/welcome/" target="_blank">More Info</a><!--Link for more info-->
                                    </v-card>
                                  </v-layout>
                                </v-container>
                              </v-tab-item>

                              <!--Philo-->
                              <v-tab-item>
                                 <v-container fluid center-align justify-center>
                                    <v-layout xs4 row center-align justify-center>
                                      <!--Philo TV First Package -->
                                    <v-card style="margin: 10px" width="250px" min-height="450px">
                                        <h2>Philo</h2><!-- Display Price and Name -->
                                        <h4>$20 /month</h4><br>
                                        <v-container v-if="comparePhilo1().length > 0"><!--Display if missing channel(s) -->
                                          <v-divider></v-divider>
                                          <h3>Missing Channels:</h3>
                                              <ul>
                                                <li v-for="name in comparePhilo1()" :label="name" >@{{name}}</li>
                                              </ul>
                                        </v-container>
                                        <v-container v-else><!-- Else display -->
                                          <v-divider></v-divider>
                                          <h3>No Missing Channels</h3>
                                        </v-container>
                                        <v-container>
                                        <br><v-divider></v-divider>
                                        <h3>Number of Streams:</h3><!--show number of streams -->
                                        <h3>3 At Once</h3>
                                        <br>
                                        <h3>DVR Options:</h3>
                                        <h3>Unlimited Cloud Recording</h3>
                                        <p>**Recordings stay for 30 days</p>
                                        <br>
                                        <a href="https://try.philo.com/" target="_blank">More Info</a><!--Link for more info-->
                                        </v-container>
                                    </v-card>

                                      
                                    </v-layout>
                                  </v-container>
                              </v-tab-item>

                              <!--Fubo-->
                              <v-tab-item>
                                  <v-container fluid center-align justify-center>
                                      <v-layout xs4 row center-align justify-center>
                                        <!--FuboTV First Package -->                        
                                    <v-card style="margin: 10px" width="250px" min-height="450px">
                                        <h2>fubo Standard</h2><!-- Display Price and Name -->
                                        <h4>$55 /month</h4><br>
                                        <v-container v-if="compareFubo1().length > 0"><!--Display if missing channel(s) -->
                                          <v-divider></v-divider>
                                          <h3>Missing Channels:</h3>
                                              <ul>
                                                <li v-for="name in compareFubo1()" :label="name" >@{{name}}</li>
                                              </ul>
                                        </v-container>
                                        <v-container v-else><!-- Else display -->
                                          <v-divider></v-divider>
                                          <h3>No Missing Channels</h3>
                                        </v-container>
                                        <v-container v-if="showtime().length > 0 || fubosport().length > 0">
                                          <h3>Add-Ons Needed:</h3>                                            
                                          <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                          <h4 v-if="fubosport().length > 0">Sports Pass($9) for:</h4>
                                          <ul>
                                            <li v-for="name in fubosport()" :label="name">@{{name}}</li>
                                          </ul>
                                        </v-container> 
                                        <v-container>
                                        <br><v-divider></v-divider>
                                        <h3>Number of Streams:</h3><!--show number of streams -->
                                        <h3>2 At Once</h3>
                                        <p>Add a 3rd for $5.99/month</p>
                                        <br>
                                        <h3>DVR Options:</h3>
                                        <h3>30 Hours of Cloud Storage</h3>
                                        <p>500 Hours Available for $9.99/month</p>
                                        <br>
                                        <a href="https://www.fubo.tv/welcome" target="_blank">More Info</a><!--Link for more info-->
                                        </v-container>
                                    </v-card>

                                      <!--FuboTV Extra-->
                                        <v-card style="margin: 10px" width="250px" min-height="400px">
                                          <h2>fubo Family</h2><!-- Display Price and Name -->
                                          <h4>$55 /month</h4><br>
                                          <v-container v-if="compareFubo2().length > 0"><!--Display if missing channel(s) -->
                                            <v-divider></v-divider>
                                            <h3>Missing Channels:</h3>
                                                <ul>
                                                  <li v-for="name in compareFubo2()" :label="name" >@{{name}}</li>
                                                </ul>
                                          </v-container>
                                          <v-container v-else><!-- Else display -->
                                            <v-divider></v-divider>
                                            <h3>No Missing Channels</h3>
                                          </v-container>
                                          <v-container v-if="showtime().length > 0 || fubosport1().length > 0">
                                            <h3>Add-Ons Needed:</h3>                                            
                                            <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                            <h4 v-if="fubosport1().length > 0">Sports Pass($9) for:</h4>
                                            <ul>
                                              <li v-for="name in fubosport1()" :label="name">@{{name}}</li>
                                            </ul>
                                          </v-container>
                                          
                                          <v-container>
                                          <br><v-divider></v-divider>
                                          <h3>Number of Streams:</h3><!--show number of streams -->
                                          <h3>2 At Once</h3>
                                          <p>Add a 3rd for $5.99/month</p>
                                          <br>
                                          <h3>DVR Options:</h3>
                                          <h3>30 Hours of Cloud Storage</h3>
                                          <p>500 Hours Available for $9.99/month</p>
                                          <br>
                                          <a href="https://www.fubo.tv/welcome" target="_blank">More Info</a><!--Link for more info-->
                                          </v-container>
                                        </v-card>

                                        <!--FuboTV Ultra-->
                                        <v-card style="margin: 10px" width="250px" min-height="400px">
                                            <h2>fubo Ultra</h2><!-- Display Price and Name -->
                                            <h4>$80 /month</h4><br>
                                            <v-container v-if="compareFubo2().length > 0"><!--Display if missing channel(s) -->
                                              <v-divider></v-divider>
                                              <h3>Missing Channels:</h3>
                                                  <ul>
                                                    <li v-for="name in compareFubo2()" :label="name" >@{{name}}</li>
                                                  </ul>
                                            </v-container>
                                            <v-container v-else><!-- Else display -->
                                              <v-divider></v-divider>
                                              <h3>No Missing Channels</h3>
                                            </v-container>
                                            <v-container v-if="showtime().length > 0 || fubosport1().length > 0">
                                              <h3>Add-Ons Needed:</h3>                                            
                                              <h4 v-if="showtime().length > 0">Showtime Add-on($11)</h4>
                                              <h4 v-if="fubosport1().length > 0">Sports Pass($9) for:</h4>
                                              <ul>
                                                <li v-for="name in fubosport1()" :label="name">@{{name}}</li>
                                              </ul>
                                            </v-container>
                                            
                                            <v-container>
                                            <br><v-divider></v-divider>
                                            <h3>Number of Streams:</h3><!--show number of streams -->
                                            <h3>2 At Once</h3>
                                            <p>Add a 3rd for $5.99/month</p>
                                            <br>
                                            <h3>DVR Options:</h3>
                                            <h3>30 Hours of Cloud Storage</h3>
                                            <p>500 Hours Available for $9.99/month</p>
                                            <br>
                                            <a href="https://www.fubo.tv/welcome" target="_blank">More Info</a><!--Link for more info-->
                                            </v-container>
                                          </v-card>
                                        </v-layout>
                                    </v-container>
                              </v-tab-item>

                              <!--ATT-->
                              <v-tab-item>
                                  <v-container fluid center-align justify-center>
                                      <v-layout xs4 row center-align justify-center>
                                        <!--AT&T Watch-->
                                        <v-card style="margin: 10px" width="250px" min-height="400px">
                                            <h2>AT&T WatchTV</h2><!-- Display Price and Name -->
                                            <h4>$15 /month</h4><br>
                                            <v-container v-if="compareATT().length > 0"><!--Display if missing channel(s) -->
                                              <v-divider></v-divider>
                                              <h3>Missing Channels:</h3>
                                                  <ul>
                                                    <li v-for="name in compareATT()" :label="name" >@{{name}}</li>
                                                  </ul>
                                            </v-container>
                                            <v-container v-else><!-- Else display -->
                                              <v-divider></v-divider>
                                              <h3>No Missing Channels</h3>
                                            </v-container>
                                            <v-container>
                                            <br><v-divider></v-divider>
                                            <h3>Number of Streams:</h3><!--show number of streams -->
                                            <h3>1 At A Time</h3>
                                            <br>
                                            <h3>DVR Options:</h3>
                                            <h3>No DVR Available</h3>
                                            <br>
                                            <a href="https://www.attwatchtv.com/" target="_blank">More Info</a><!--Link for more info-->
                                            </v-container>
                                        </v-card>    
                                      </v-layout>
                                    </v-container>
                              </v-tab-item>


                            </v-tabs>

   
                          
                        </v-card> 
                        
                        <v-btn color="primary" @click="e1 = 1">Channel Picker</v-btn>
                                        
                      </v-stepper-content>
                    </v-stepper-items>
              </v-stepper>
      
    </v-app>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data() {
        return {
          searchBar: '',
          e1: 0,        
          choiceChan: [],
          channels: {!! $channels !!},
          hulu:[
            'HBO', 'Showtime', 'Cinemax', 'Starz', 'DIY', 'FYI', 'Destination America', 'Oxygen', 'ABC', 'CBS', 'FOX', 'NBC', 'A&E', 'Animal Planet', 'Bravo', 'Cartoon Network', 'CNBC', 'CNN', 'CW', 'Discovery', 'Disney', 'Disney Junior', 'Disney XD', 'E!', 'ESPN', 'ESPN2', 'Food', 'Fox News', 'FS1', 'Freeform', 'FX', 'FXX', 'Golf', 'HGTV', 'History', 'HLN', 'Investigation Discovery', 'Lifetime', 'MSNBC', 'National Geographic', 'Nat Geo Wild', 'NBCSN', 'Pop', 'Smithsonian Channel', 'SEC Network', 'Syfy', 'Telemundo','TBS', 'Turner Classic Movies', 'TLC', 'TNT', 'Travel', 'TruTV', 'Universal Kids', 'USA' 
          ],
          huluenter:[
            'DIY', 'FYI', 'Destination America'
          ],
          philo1:[
            'A&E', 'AMC', 'Animal Planet', 'BBC America', 'BET', 'CMT', 'Comedy Central', 'Destination America', 'Discovery', 'DIY', 'Food', 'FYI', 'GSN', 'Hallmark','Nicktoons', 'HGTV', 'History', 'IFC', 'Investigation Discovery', 'Lifetime', 'MTV', 'Nick', 'Nick Jr.', 'Sundance TV', 'Tastemade', 'TLC', 'Travel', 'VH1', 'We TV'
          ],
          fubo1:[
            'Showtime', 'Tennis Channel', 'Universo', 'FS1', 'NBCSN','NFL Network', 'NBA TV', 'A&E', 'AMC', 'BBC America', 'E!', 'Bravo', 'CNN', 'Food', 'Fox News', 'FX', 'HGTV', 'History', 'MSNBC', 'TNT', 'TBS', 'USA', 'National Geographic', 'Golf', 'Hallmark', 'IFC', 'Lifetime', 'Sundance TV', 'Turner Classic Movies', 'Syfy', 'TruTV', 'Oxygen', 'Nat Geo Wild', 'FXX', 'Telemundo', 'Travel', 'CNBC', 'Weather Channel', 'HLN', 'Adult Swim', 'Cartoon Network', 'Galavision', 'Universo', 'FYI', 'Pop', 'Universal Kids', 'We TV', 'Smithsonian Channel'
          ],
          fubo2:[
            'Showtime', 'NFL Network', 'Tennis Channel', 'DIY', 'GSN', 'FS1', 'NBCSN', 'A&E', 'AMC', 'BBC America', 'E!', 'Bravo', 'CNN', 'Food', 'Fox News', 'FX', 'HGTV', 'History', 'MSNBC', 'TNT', 'TBS', 'USA', 'National Geographic', 'NBA TV', 'Golf', 'Hallmark', 'IFC', 'Lifetime', 'Sundance TV', 'Turner Classic Movies', 'Syfy', 'TruTV', 'Oxygen', 'Nat Geo Wild', 'FXX', 'Telemundo', 'Travel', 'CNBC', 'Weather Channel', 'HLN', 'Adult Swim', 'Cartoon Network', 'Galavision', 'Universo', 'FYI', 'Pop', 'Universal Kids', 'We TV', 'Smithsonian Channel'
          ],
          psaccess:[
            'Cinemax', 'HBO', 'Showtime', 'NBC', 'ABC', 'FOX', 'AMC', 'Animal Planet', 'BBC America', 'Bravo', 'Cartoon Network', 'CNN', 'CNBC', 'Destination America', 'Discovery', 'Disney', 'Disney Junior', 'Disney XD', 'E!', 'ESPN', 'ESPN2', 'Food', 'Fox News', 'Freeform', 'FS1', 'FX', 'FXX', 'HGTV', 'HLN', 'Investigation Discovery', 'MSNBC', 'National Geographic', 'NBCSN', 'Oxygen', 'Start TV', 'Syfy', 'TBS', 'Telemundo', 'TLC', 'TNT', 'Travel', 'TruTV', 'USA', 'We TV'
          ],
          pscore:[
            'Cinemax', 'HBO', 'Showtime', 'NBC', 'CNN', 'Comet TV', 'NFL Network','MLB Network', 'Comet', 'DIY', 'Golf', 'Hallmark', 'IFC', 'Nat Geo Wild', 'NBA TV', 'Pop', 'SEC Network', 'Smithsonian Channel', 'Sundance TV', 'Tastemade', 'Turner Classic Movies', 'ABC', 'FOX', 'AMC', 'Animal Planet', 'BBC America', 'Bravo', 'Cartoon Network', 'CNBC', 'Destination America', 'Discovery', 'Disney', 'Disney Junior', 'Disney XD', 'E!', 'ESPN', 'ESPN2', 'Food', 'Fox News', 'Freeform', 'FS1', 'FX', 'FXX', 'HGTV', 'HLN', 'Investigation Discovery', 'MSNBC', 'National Geographic', 'NBCSN', 'Oxygen', 'Start TV', 'Syfy', 'TBS', 'Telemundo', 'TLC', 'TNT', 'Travel', 'TruTV', 'USA', 'We TV'
          ],
          pselite:[
            'Cinemax', 'HBO', 'Showtime', 'NBC', 'CNN', 'Comet TV', 'MLB Network', 'NFL Network', 'Tennis Channel', 'Universal Kids', 'Comet', 'DIY', 'Golf', 'Hallmark', 'IFC', 'Nat Geo Wild', 'NBA TV', 'Pop', 'SEC Network', 'Smithsonian Channel', 'Sundance TV', 'Tastemade', 'Turner Classic Movies', 'ABC', 'FOX', 'AMC', 'Animal Planet', 'BBC America', 'Bravo', 'Cartoon Network', 'CNBC', 'Destination America', 'Discovery', 'Disney', 'Disney Junior', 'Disney XD', 'E!', 'ESPN', 'ESPN2', 'Food', 'Fox News', 'Freeform', 'FS1', 'FX', 'FXX', 'HGTV', 'HLN', 'Investigation Discovery', 'MSNBC', 'National Geographic', 'NBCSN', 'Oxygen', 'Start TV', 'Syfy', 'TBS', 'Telemundo', 'TLC', 'TNT', 'Travel', 'TruTV', 'USA', 'We TV'
          ],
          psultra:[
            'Cinemax', 'HBO', 'Showtime', 'NBC', 'CNN', 'Comet TV', 'MLB Network', 'NFL Network', 'Tennis Channel', 'Universal Kids', 'Comet', 'DIY', 'Golf', 'Hallmark', 'IFC', 'Nat Geo Wild', 'NBA TV', 'Pop', 'SEC Network', 'Smithsonian Channel', 'Sundance TV', 'Tastemade', 'Turner Classic Movies', 'ABC', 'FOX', 'AMC', 'Animal Planet', 'BBC America', 'Bravo', 'Cartoon Network', 'CNBC', 'Destination America', 'Discovery', 'Disney', 'Disney Junior', 'Disney XD', 'E!', 'ESPN', 'ESPN2', 'Food', 'Fox News', 'Freeform', 'FS1', 'FX', 'FXX', 'HGTV', 'HLN', 'Investigation Discovery', 'MSNBC', 'National Geographic', 'NBCSN', 'Oxygen', 'Start TV', 'Syfy', 'TBS', 'Telemundo', 'TLC', 'TNT', 'Travel', 'TruTV', 'USA', 'We TV'
          ],
          att:[
            'A&E', 'AMC', 'Animal Planet', 'BBC America', 'BET', 'Cartoon Network', 'CNN', 'Comedy Central', 'Discovery', 'Food', 'FYI', 'Hallmark', 'HGTV', 'History', 'HLN', 'IFC', 'Investigation Discovery', 'Lifetime', 'Nicktoons', 'Sundance TV', 'TBS', 'Turner Classic Movies', 'TLC', 'TNT', 'TruTV', 'VH1', 'We TV'
          ],
          dir1:[
            'ABC', 'Bravo', 'Cartoon Network', 'CBS', 'CNBC', 'CNN', 'Comedy Central', 'CW', 'Disney', 'Disney Junior', 'Disney XD', 'E!', 'ESPN', 'ESPN2', 'FOX', 'Fox News', 'FS1', 'Freeform', 'FX', 'FXX', 'Hallmark', 'HLN', 'MSNBC', 'Nat Geo Wild', 'National Geographic', 'NBC', 'NBCSN', 'Oxygen', 'Syfy', 'TBS', 'Turner Classic Movies', 'TNT', 'TruTV','Universal Kids', 'USA', 'HBO', 'Cinemax', 'Starz', 'Showtime'
          ],
          dir2:[
            'ABC', 'Bravo', 'Cartoon Network', 'CBS', 'CNBC', 'CNN', 'Comedy Central', 'CW', 'Disney', 'Disney Junior', 'Disney XD', 'E!', 'ESPN', 'ESPN2', 'FOX', 'Fox News', 'FS1', 'Freeform', 'FX', 'FXX', 'Golf', 'Hallmark', 'HLN', 'MSNBC', 'Nat Geo Wild', 'National Geographic', 'NBC', 'NBCSN', 'Oxygen', 'SEC Network', 'Syfy', 'TBS', 'Turner Classic Movies', 'TNT', 'TruTV','Universal Kids', 'USA', 'HBO', 'Cinemax', 'Starz', 'Showtime'
          ],
          dir3:[
            'A&E', 'ABC', 'AMC', 'Animal Planet', 'BBC America', 'BET', 'Bravo', 'Cartoon Network', 'CBS', 'CMT', 'CNBC', 'CNN', 'Comedy Central', 'CW', 'Discovery', 'Disney', 'Disney Junior', 'Disney XD', 'E!', 'ESPN', 'ESPN2', 'Food', 'FOX', 'Fox News', 'Freeform', 'FS1', 'FX', 'FXX', 'Galavision', 'Hallmark', 'HGTV', 'History', 'HLN', 'Investigation Discovery', 'Lifetime', 'MSNBC', 'MTV', 'National Geographic', 'NBC', 'NBCSN', 'Nick Jr.', 'Nick', 'RFD', 'Syfy', 'TBS', 'Turner Classic Movies', 'Telemundo', 'TLC', 'TNT', 'TruTV', 'Univision', 'USA', 'VH1', 'We TV', 'HBO', 'Cinemax', 'Starz', 'Showtime'
          ],
          dir4:[
            'A&E', 'ABC', 'AMC', 'Animal Planet', 'BBC America', 'BET', 'Bravo', 'Cartoon Network', 'CBS', 'CMT', 'CNBC', 'CNN', 'Comedy Central', 'CW', 'Discovery', 'Disney', 'Disney Junior', 'Disney XD', 'E!', 'ESPN', 'ESPN2', 'Food', 'FOX', 'Fox News', 'Freeform', 'FS1', 'FX', 'FXX', 'Galavision', 'GSN', 'HGTV', 'Hallmark', 'History', 'HLN', 'IFC', 'Investigation Discovery', 'Lifetime', 'MLB Network', 'MSNBC', 'MTV', 'National Geographic', 'NBC', 'NBCSN', 'NFL Network', 'Nick Jr.', 'Nick', 'Nicktoons', 'Pop', 'RFD', 'SEC Network', 'Syfy', 'Sundance TV', 'TBS', 'Tennis Channel', 'Travel', 'Turner Classic Movies', 'Telemundo', 'TLC', 'TNT', 'TruTV', 'USA', 'VH1', 'We TV', 'Weather Channel', 'HBO', 'Cinemax', 'Starz', 'Showtime'
          ],
          dir5:[
            'A&E', 'ABC', 'AMC', 'Animal Planet', 'BBC America', 'BET', 'Bravo', 'Cartoon Network', 'CBS', 'CMT', 'CNBC', 'CNN', 'Comedy Central', 'CW', 'Destination America', 'Discovery', 'Disney', 'Disney Junior', 'Disney XD', 'DIY', 'E!', 'ESPN', 'ESPN2', 'Food', 'FOX', 'Fox News', 'Freeform', 'FS1', 'FX', 'FXX', 'FYI', 'Galavision', 'Golf', 'GSN', 'HGTV', 'Hallmark', 'History', 'HLN', 'IFC', 'Investigation Discovery', 'Lifetime', 'MLB Network', 'MSNBC', 'MTV', 'National Geographic', 'Nat Geo Wild', 'NBA TV', 'NBC', 'NBCSN', 'NFL Network', 'Nick Jr.', 'Nick', 'Nicktoons', 'Oxygen', 'Pop', 'RFD', 'SEC Network', 'Syfy', 'Sundance TV', 'TBS', 'Tennis Channel', 'Travel', 'Turner Classic Movies', 'Telemundo', 'TLC', 'TNT', 'TruTV', 'Universal Kids', 'Universo', 'USA', 'VH1', 'We TV', 'Weather Channel', 'HBO', 'Cinemax', 'Starz', 'Showtime'
          ],
          dir6:[
            'A&E', 'ABC', 'AMC', 'Animal Planet', 'BBC America', 'BET', 'Bravo', 'Cartoon Network', 'CBS', 'CMT', 'CNBC', 'CNN', 'Comedy Central', 'CW', 'Destination America', 'Discovery', 'Disney', 'Disney Junior', 'Disney XD', 'DIY', 'E!', 'ESPN', 'ESPN2', 'Food', 'FOX', 'Fox News', 'Freeform', 'FS1', 'FX', 'FXX', 'FYI', 'Galavision', 'Golf', 'GSN', 'Hallmark', 'HGTV', 'History', 'HLN', 'IFC', 'Investigation Discovery', 'Lifetime', 'MLB Network', 'MSNBC', 'MTV', 'National Geographic', 'Nat Geo Wild', 'NBA TV', 'NBC', 'NBCSN', 'NFL Network', 'Nick Jr.', 'Nick', 'Nicktoons', 'Oxygen', 'Pop', 'RFD', 'SEC Network', 'Syfy', 'Sundance TV', 'TBS', 'Tennis Channel', 'Travel', 'Turner Classic Movies', 'Telemundo', 'TLC', 'TNT', 'TruTV', 'Universal Kids', 'Universo', 'USA', 'VH1', 'We TV', 'Weather Channel', 'HBO', 'Cinemax', 'Starz', 'Showtime'
          ],
          orange:[
            'Showtime', 'Starz', 'Comet TV', 'Turner Classic Movies', 'Sundance TV', 'Destination America', 'RFD', 'Hallmark', 'VH1', 'BET', 'DIY', 'FYI', 'We TV', 'HLN', 'MTV', 'TruTV', 'CMT', 'GSN', 'NBA TV', 'SEC Network', 'Tennis Channel', 'Disney Junior', 'Disney XD', 'Nick Jr.', 'Nicktoons', 'ESPN', 'TNT', 'TBS', 'CNN', 'AMC', 'HGTV', 'Comedy Central', 'History', 'A&E', 'IFC', 'Food', 'BBC America', 'Investigation Discovery', 'Travel', 'Cartoon Network', 'Lifetime', 'ESPN2', 'Freeform', 'Disney'
          ],
          kidorange:[
            'Disney Junior', 'Disney XD', 'Nick Jr.', 'Nicktoons'
          ],
          sportorange:[
            'NBA TV', 'SEC Network', 'Tennis Channel'
          ],
          comedyorange:[
            'MTV', 'TruTV', 'CMT', 'GSN'
          ],
          newsorange:[
            'HLN'
          ],
          lifeorange:[
            'VH1', 'BET', 'DIY', 'FYI', 'We TV', 'Hallmark'
          ],
          blue:[
            'Showtime', 'Starz',  'Destination America', 'E!', 'Comet TV', 'RFD', 'Sundance TV', 'Turner Classic Movies', 'VH1', 'Oxygen', 'DIY', 'FYI', 'Hallmark', 'We TV', 'MSNBC', 'CNBC', 'HLN', 'MTV', 'CMT', 'GSN', 'NBA TV', 'Golf', 'Tennis Channel', 'Nicktoons', 'TNT', 'TBS', 'CNN', 'AMC', 'HGTV', 'Comedy Central', 'History', 'A&E', 'IFC', 'Food', 'BBC America', 'Investigation Discovery', 'Travel', 'Cartoon Network', 'Lifetime', 'Discovery', 'FOX', 'NBC', 'TLC', 'FX', 'NFL Network', 'NBCSN', 'FXX', 'FS1', 'USA', 'Nick Jr.', 'Syfy', 'Bravo', 'National Geographic', 'Nat Geo Wild', 'BET', 'TruTV'
          ],
          kidblue:[
            'Nicktoons'
          ],
          sportblue:[
            'NBA TV', 'Golf', 'Tennis Channel'
          ],
          comedyblue:[
            'MTV', 'CMT', 'GSN'
          ],
          newsblue:[
            'MSNBC', 'CNBC', 'HLN'
          ],
          lifeblue:[
            'VH1', 'Oxygen', 'DIY', 'FYI', 'Hallmark', 'We TV'
          ],
          hollywood:[
            'Sundance TV', 'Turner Classic Movies'
          ],
          heartland:[
            'RFD', 'Destination America'
          ],
          orablu:[
            'Showtime', 'Starz', 'Discovery', 'Comet TV', 'Hallmark', 'Oxygen', 'Turner Classic Movies', 'Sundance TV', 'Destination America','Nicktoons', 'RFD', 'VH1', 'DIY', 'FYI', 'We TV', 'OXYGEN', 'E!', 'HLN', 'MSNBC', 'CNBC', 'NBA TV', 'SEC Network', 'Tennis Channel', 'Golf', 'Disney Junior', 'Disney XD', 'ESPN', 'TNT', 'TBS', 'CNN', 'AMC', 'HGTV', 'Comedy Central', 'History', 'A&E', 'IFC', 'Food', 'BBC America', 'Investigation Discovery', 'Travel', 'Cartoon Network', 'Lifetime', 'ESPN2', 'Freeform', 'Disney', 'FOX', 'NBC', 'TLC', 'FS1', 'NBCSN', 'FX', 'NFL Network', 'NFL Network', 'FXX', 'USA', 'Nick Jr.', 'Syfy', 'Bravo', 'National Geographic', 'Nat Geo Wild', 'BET', 'TruTV'
          ],
          kidob:[
            'Disney Junior', 'Disney XD', 'Nicktoons'
          ],
          sportsob:[
            'NBA TV', 'SEC Network', 'Tennis Channel', 'Golf'
          ],
          newsob:[
            'HLN', 'MSNBC', 'CNBC'
          ],
          comedyob:[
            'MTV', 'CMT', 'GSN', 'TruTV'
          ],
          lifeob:[
            'VH1', 'DIY', 'FYI', 'We TV', 'Oxygen', 'E!', 'Hallmark'
          ],
          singles:[
            'Disney', 'Disney Junior', 'Disney XD', 'ESPN', 'ESPN2', 'Freeform', 'SEC Network'
          ],
          hboo:[
            'HBO'
          ],
          showtim:[
            'Showtime'
          ],
          cinemaxx:[
            'Cinemax'
          ],
          starzz:[
            'Starz'
          ],
          youtube:[
            'TLC', 'Discovery', 'HGTV', 'Food', 'TLC', 'Investigation Discovery', 'Animal Planet', 'Travel', 'NBC', 'CBS', 'National Geographic', 'NBCSN', 'Bravo', 'ABC', 'TruTV', 'MSNBC', 'Cartoon Network', 'Pop', 'Golf', 'HLN', 'Tastemade', 'CNN', 'CNBC', 'Universal Kids', 'Smithsonian Channel', 'AMC', 'NBA TV', 'Freeform', 'Turner Classic Movies', 'FX', 'ESPN', 'Fox News', 'Oxygen', 'BBC America', 'Showtime', 'Telemundo', 'FS1', 'USA', 'TBS', 'TNT', 'MLB Network', 'Disney', 'Starz', 'Sundance TV', 'E!', 'Comet TV', 'IFC', 'FOX', 'Disney', 'Disney Junior', 'Disney XD', 'SEC Network', 'ESPN2', 'FXX', 'Nat Geo Wild', 'Start TV', 'Syfy', 'Tennis Channel', 'We TV', 'Universo'
          ],
          fubosprt:[
            'Universo', 'Tennis Channel'
          ],
          fubosprt1:[
            'Universo'
          ]
        }
      },

    computed:{
      filteredChans(){
        return this.channels.filter(channels =>{
          return channels.toLowerCase().includes(this.searchBar.toLowerCase())
        })
      }
    },
      
    methods: {
      clearSelected: function(){
        this.choiceChan = [];
      },
      compareHulu: function(){
        diff = $(this.choiceChan).not(this.hulu).get();
        return diff;
      },
      comparePhilo1: function(){
        diff = $(this.choiceChan).not(this.philo1).get();
        return diff;
      },
      comparePhilo2: function(){
        diff = $(this.choiceChan).not(this.philo2).get();
        return diff;
      },
      compareFubo1: function(){
        diff = $(this.choiceChan).not(this.fubo1).get();
        return diff;
      },
      compareFubo2: function(){
        diff = $(this.choiceChan).not(this.fubo2).get();
        return diff;
      },
      comparePSAccess: function(){
        diff = $(this.choiceChan).not(this.psaccess).get();
        return diff;
      },
      comparePSCore: function(){
        diff = $(this.choiceChan).not(this.pscore).get();
        return diff;
      },
      comparePSElite: function(){
        diff = $(this.choiceChan).not(this.pselite).get();
        return diff;
      },
      comparePSUltra: function(){
        diff = $(this.choiceChan).not(this.psultra).get();
        return diff;
      },
      compareATT: function(){
        diff = $(this.choiceChan).not(this.att).get();
        return diff;
      },
      compareDir1: function(){
        diff = $(this.choiceChan).not(this.dir1).get();
        return diff;
      },
      compareDir2: function(){
        diff = $(this.choiceChan).not(this.dir2).get();
        return diff;
      },
      compareDir3: function(){
        diff = $(this.choiceChan).not(this.dir3).get();
        return diff;
      },
      compareDir4: function(){
        diff = $(this.choiceChan).not(this.dir4).get();
        return diff;
      },
      compareDir5: function(){
        diff = $(this.choiceChan).not(this.dir5).get();
        return diff;
      },
      compareDir6: function(){
        diff = $(this.choiceChan).not(this.dir6).get();
        return diff;
      },
      compareYoutube: function(){
        diff = $(this.choiceChan).not(this.youtube).get();
        return diff;
      },
      compareOrange: function(){
        diff = $(this.choiceChan).not(this.orange).get();
        return diff;
      },
      compareBlue: function(){
        diff = $(this.choiceChan).not(this.blue).get();
        return diff;
      },
      compareOrablu: function(){
        diff = $(this.choiceChan).not(this.orablu).get();
        return diff;
      },
      blueKids: function(){
        diff = $(this.choiceChan).filter(this.kidblue).get();
        return diff;
      },
      blueSports: function(){
        diff = $(this.choiceChan).filter(this.sportblue).get();
        return diff;
      },
      blueComedy: function(){
        diff = $(this.choiceChan).filter(this.comedyblue).get();
        return diff;
      },
      blueNews: function(){
        diff = $(this.choiceChan).filter(this.newsblue).get();
        return diff;
      },
      blueLife: function(){
        diff = $(this.choiceChan).filter(this.lifeblue).get();
        return diff;
      },
      slingHollywood: function(){
        diff = $(this.choiceChan).filter(this.hollywood).get();
        return diff;
      },
      slingHeartland: function(){
        diff = $(this.choiceChan).filter(this.heartland).get();
        return diff;
      },
      orangeKids: function(){
        diff = $(this.choiceChan).filter(this.kidorange).get();
        return diff;
      },
      orangeSports: function(){
        diff = $(this.choiceChan).filter(this.sportorange).get();
        return diff;
      },
      orangeComedy: function(){
        diff = $(this.choiceChan).filter(this.comedyorange).get();
        return diff;
      },
      orangeNews: function(){
        diff = $(this.choiceChan).filter(this.newsorange).get();
        return diff;
      },
      orangeLife: function(){
        diff = $(this.choiceChan).filter(this.lifeorange).get();
        return diff;
      },
      obKids: function(){
        diff = $(this.choiceChan).filter(this.kidob).get();
        return diff;
      },
      obSports: function(){
        diff = $(this.choiceChan).filter(this.sportsob).get();
        return diff;
      },
      obNews: function(){
        diff = $(this.choiceChan).filter(this.newsob).get();
        return diff;
      },
      obComedy: function(){
        diff = $(this.choiceChan).filter(this.comedyob).get();
        return diff;
      },
      obLife: function(){
        diff = $(this.choiceChan).filter(this.lifeob).get();
        return diff;
      },
      singleStream: function(){
        diff = $(this.choiceChan).filter(this.singles).get();
        return diff;
      },
      huluEnt: function(){
        diff = $(this.choiceChan).filter(this.huluenter).get();
        return diff;
      },
      hbo: function(){
        diff = $(this.choiceChan).filter(this.hboo).get();
        return diff;
      },
      showtime: function(){
        diff = $(this.choiceChan).filter(this.showtim).get();
        return diff;
      },
      cinemax: function(){
        diff = $(this.choiceChan).filter(this.cinemaxx).get();
        return diff;
      },
      starz: function(){
        diff = $(this.choiceChan).filter(this.starzz).get();
        return diff;
      },
      fubosport: function(){
        diff = $(this.choiceChan).filter(this.fubosprt).get();
        return diff;
      },
      fubosport1: function(){
        diff = $(this.choiceChan).filter(this.fubosprt1).get();
        return diff;
      }

      

    },
    
    
    
        }    )
  
  </script>
</body>
</html>