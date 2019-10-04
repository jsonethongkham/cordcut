<!DOCTYPE html>
<html>
<head>
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <style>
      .v-label{
        width: 150px;
      }
   
      .v-input__control{
        color:red;
}
    

    </style>
</head>


<body>
    <div style="text-align: center">
  <div id="app" style="width: 80%; height:90%; margin-top: 50px; display:inline-block">
    <v-app style="height: 80%">
      
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
                            <v-container fluid width="80%">
                              <v-layout row wrap>
                                
                                  <input type="checkbox" v-for="channel in channels" v-model="choiceChan" :key="channel.id" :value="channel.value" :label="channel.value" aria-hidden="false">{{ channel.value }}</input>
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
          channels: [
            { id: 1, value: 'A&E'},
            { id: 2, value: 'ABC'},
            { id: 4, value: 'AMC'},
            { id: 5, value: 'Animal Planet'},
            { id: 6, value: 'BBC America'},
            { id: 7, value: 'BET'},
            { id: 8, value: 'Bravo'},
            { id: 9, value: 'Cartoon Network'},
            { id: 10, value: 'CBS'},
            { id: 77, value: 'CMT'},
            { id: 11, value: 'CNN'},
            { id: 12, value: 'CNBC'},
            { id: 13, value: 'Comedy Central'},
            { id: 14, value: 'Comet TV'},
            { id: 15, value: 'CW'},
            { id: 16, value: 'Destination America'},
            { id: 78, value: 'Discovery'},
            { id: 17, value: 'Disney'},
            { id: 18, value: 'Disney Junior'},
            { id: 19, value: 'Disney XD'},
            { id: 20, value: 'DIY' }, 
            { id: 21, value: 'E!' },
            { id: 22, value: 'ESPN' },
            { id: 23, value: 'ESPN2' },
            { id: 24, value: 'Food' },
            { id: 25, value: 'FOX' },
            { id: 26, value: 'Fox News' },
            { id: 27, value: 'FS1' },
            { id: 28, value: 'Freeform' },
            { id: 29, value: 'FX' },
            { id: 30, value: 'FXX' },
            { id: 31, value: 'FYI' },
            { id: 32, value: 'Galavision' },
            { id: 33, value: 'GSN' },
            { id: 34, value: 'Golf' },
            { id: 36, value: 'Hallmark' },
            { id: 37, value: 'HGTV' },
            { id: 38, value: 'History' },
            { id: 39, value: 'HLN' },
            { id: 40, value: 'IFC' },
            { id: 41, value: 'Investigation Discovery' },
            { id: 42, value: 'Lifetime' },
            { id: 43, value: 'MLB Network' },
            { id: 44, value: 'MSNBC' },
            { id: 45, value: 'MTV' },
            { id: 46, value: 'National Geographic' },
            { id: 47, value: 'Nat Geo Wild' },
            { id: 48, value: 'NBA TV' },
            { id: 49, value: 'NBC' },
            { id: 50, value: 'NBCSN' },
            { id: 51, value: 'Nick' },
            { id: 52, value: 'Nick Jr.'},
            { id: 53, value: 'Nicktoons' },
            { id: 54, value: 'Oxygen' },
            { id: 55, value: 'Pop' },
            { id: 80, value: 'RFD' },
            { id: 56, value: 'SEC Network' },
            { id: 57, value: 'Smithsonian Channel' },
            { id: 58, value: 'Start TV' },
            { id: 59, value: 'Sundance TV' },
            { id: 60, value: 'Syfy' },
            { id: 61, value: 'Tastemade' },
            { id: 62, value: 'TBS' },
            { id: 63, value: 'Telemundo' },
            { id: 64, value: 'Tennis Channel' },
            { id: 65, value: 'TLC' },
            { id: 66, value: 'TNT'},
            { id: 67, value: 'Travel' },
            { id: 68, value: 'TruTV' },
            { id: 69, value: 'Turner Classic Movies' },
            { id: 70, value: 'Universal Kids' },
            { id: 71, value: 'Universo'},
            { id: 72, value: 'USA' },
            { id: 73, value: 'VH1' },
            { id: 74, value: 'Weather Channel'},
            { id: 75, value: 'We TV'},
            { id:76, value: 'NFL Network'},    
            { id:81, value: 'HBO'},
            { id:82, value: 'Showtime'},  
            { id:83, value: 'Cinemax'}, 
            { id:84, value: 'Starz'} 
          ],
          hulu:[
            'HBO', 'Showtime', 'Cinemax', 'Starz', 'DIY', 'FYI', 'Destination America', 'Oxygen', 'ABC', 'CBS', 'FOX', 'NBC', 'A&E', 'Animal Planet', 'Bravo', 'Cartoon Network', 'CNBC', 'CNN', 'CW', 'Discovery', 'Disney', 'Disney Junior', 'Disney XD', 'E!', 'ESPN', 'ESPN2', 'Food', 'Fox News', 'FS1', 'Freeform', 'FX', 'FXX', 'Golf', 'HGTV', 'History', 'HLN', 'Investigation Discovery', 'Lifetime', 'MSNBC', 'National Geographic', 'Nat Geo Wild', 'NBCSN', 'Pop', 'Smithsonian Channel', 'SEC Network', 'Syfy', 'Telemundo','TBS', 'Turner Classic Movies', 'TLC', 'TNT', 'Travel', 'TruTV', 'Universal Kids', 'USA' 
          ],
          huluenter:[
            'DIY', 'FYI', 'Destination America'
          ],
          philo1:[
            'A&E', 'AMC', 'Animal Planet', 'BBC America', 'BET', 'CMT', 'Comedy Central', 'Discovery', 'DIY', 'Food', 'FYI', 'GSN', 'Hallmark', 'HGTV', 'IFC', 'Investigation Discovery', 'Lifetime', 'MTV', 'Nick', 'Nick Jr.', 'Sundance TV', 'Tastemade', 'History', 'TLC', 'Travel', 'VH1', 'We TV'
          ],
          philo2:[
            'A&E', 'AMC', 'Animal Planet', 'BBC America', 'BET', 'CMT', 'Comedy Central', 'Destination America', 'Discovery', 'DIY', 'Food', 'FYI', 'GSN', 'Hallmark', 'HGTV', 'History', 'IFC', 'Investigation Discovery', 'Lifetime', 'MTV', 'Nick', 'Nick Jr.', 'Nicktoons', 'Sundance TV', 'Tastemade', 'TLC', 'Travel', 'VH1', 'We TV'
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
            'Discovery', 'HGTV', 'Food', 'TLC', 'Investigation Discovery', 'Animal Planet', 'Travel', 'NBC', 'CBS', 'National Geographic', 'Smithsonian Channel', 'NBCSN', 'Bravo', 'CW', 'ABC', 'TruTV', 'MSNBC', 'Cartoon Network', 'Pop', 'Golf', 'HLN', 'Tastemade', 'CNN', 'CNBC', 'Universal Kids', 'AMC', 'NBA TV', 'Freeform', 'Turner Classic Movies', 'FX', 'ESPN', 'Fox News', 'Oxygen', 'BBC America', 'Showtime', 'Telemundo', 'FS1', 'USA', 'TBS', 'TNT', 'MLB Network', 'Disney', 'Starz', 'Sundance TV', 'E!', 'Comet TV', 'IFC', 'FOX', 'Disney', 'Disney Junior', 'Disney XD', 'SEC Network', 'ESPN2', 'FXX', 'Nat Geo Wild', 'Start TV', 'Syfy', 'Tennis Channel', 'We TV', 'Universo'
          ],
          fubosprt:[
            'Universo', 'Tennis Channel'
          ],
          fubosprt1:[
            'Universo'
          ]
        }
    },


    })
   
  </script>
</body>
</html>