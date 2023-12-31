var bombs = new Backbone.Collection([
  {
    name: 'Gerboise Bleue',
    radius: 0,
    yeild: 70,
    country: 'France',
    significance: 'First fission weapon test by France',
    date: '1960-02-13',
    fillKey: 'FRA',
    latitude: -0.325,
    longitude: 26.1840
  }, {
    name: 'Canopus',
    radius: 0,
    yeild: 2600,
    country: 'France',
    significance: 'First "staged" thermonuclear test by France',
    fillKey: 'FRA',
    date: '1968-08-24',
    latitude: -22.15,
    longitude: -138.45
  }, {
    name: 'Smiling Buddha',
    radius: 0,
    yeild: 12,
    country: 'India',
    significance: 'First fission nuclear explosive test by India',
    fillKey: 'IND',
    date: '1974-05-18',
    latitude: 27.095,
    longitude: 71.753
  }, {
    name: 'Pokhran-II',
    radius: 0,
    yeild: 60,
    country: 'India',
    fillKey: 'IND',
    significance: 'First potential fusion/boosted weapon test by India; first deployable fission weapon test by India',
    date: '1998-05-11',
    latitude: 27.07884,
    longitude: 71.72211
  }, {
    name: '2006 North Korean nuclear test',
    radius: 0,
    yeild: 1,
    country: 'North Korea',
    fillKey: 'PRK',
    significance: 'First fission plutonium-based device tested by North Korea; likely resulted as a fizzle',
    date: '2006-10-09',
    latitude: 40.5743,
    longitude: 129.2012
  }, {
    name: '2009 North Korean nuclear test',
    radius: 0,
    yeild: 15,
    country: 'North Korea',
    significance: 'First successful fission device tested by North Korea',
    date: '2009-05-25',
    fillKey: 'PRK',
    latitude: 41.306,
    longitude: 129.029
  }, {
    name: 'Chagai-I',
    radius: 0,
    yeild: 40,
    country: 'Pakistan',
    significance: 'First fission weapon (boosted) test by Pakistan',
    fillKey: 'PAK',
    date: '1998-05-28',
    latitude: 30.12,
    longitude: 67.01
  }, {
    name: 'Chagai-II',
    radius: 0,
    yeild: 20,
    country: 'Pakistan',
    significance: 'Second fission weapon (boosted) test by Pakistan',
    fillKey: 'PAK',
    date: '1998-05-30',
    latitude: 30.22,
    longitude: 67.11
  }, {
    name: '596',
    radius: 0,
    yeild: 22,
    country: 'PR China',
    significance: 'First fission weapon test by the People\'s Republic of China',
    fillKey: 'PRC',
    date: '1964-10-16',
    latitude: 42.35,
    longitude: 88.30
  }, {
    name: 'Test No. 6',
    radius: 0,
    yeild: 3300,
    country: 'PR China',
    fillKey: 'PRC',
    significance: 'First "staged" thermonuclear weapon test by the People\'s Republic of China',
    date: '1967-06-17',
    latitude: 40.10,
    longitude: 90.35
  }, {
    name: 'Hurricane',
    radius: 0,
    yeild: 25,
    country: 'UK',
    significance: 'First fission weapon test by the UK',
    fillKey: 'GBR',
    date: '1952-10-03',
    latitude: -20.25,
    longitude: 115.33
  }, {
    name: 'Grapple X',
    radius: 0,
    yeild: 1800,
    country: 'UK',
    fillKey: 'GBR',
    significance: 'First (successful) "staged" thermonuclear weapon test by the UK',
    date: '1957-11-08',
    latitude: 1.53,
    longitude: -157.24
  },
{
    name: 'Trinity',
    radius: 0,
    yeild: 19,
    country: 'USA',
    fillKey: 'USA',
    significance: 'First fission device test, first plutonium implosion detonation ',
    date: '1945-07-16',
    latitude: 33.4038,
    longitude: -106.2831
  },{
    name: 'Little Boy',
    radius: 0,
    yeild: 13,
    country: 'USA',
    fillKey: 'USA',
    significance: 'Bombing of Hiroshima, Japan, first detonation of an enriched uranium gun-type device, first use of a nuclear device in military combat.',
    date: '1945-08-06',
    latitude: 34.237,
    longitude: 132.2719
  },{
    name: 'Fat Man',
    radius: 0,
    yeild: 20,
    fillKey: 'USA',
    country: 'USA',
    significance: 'Bombing of Nagasaki, Japan, second and last use of a nuclear device in military combat.',
    date: '1945-08-09',
    latitude: 32.4625,
    longitude: 129.5147
  },{
    name: 'Ivy Mike',
    radius: 0,
    yeild: 10400,
    country: 'USA',
    fillKey: 'USA',
    significance: 'First cryogenic fusion fuel "staged" thermonuclear weapon, primarily a test device and not weaponized',
    date: '1952-11-01',
    latitude: 11.40,
    longitude: 162.1113
  },{
    name: 'Castle Bravo',
    radius: 0,
    yeild: 15000,
    country: 'USA',
    significance: 'First dry fusion fuel "staged" thermonuclear weapon; a serious nuclear fallout accident occurred',
    fillKey: 'USA',
    date: '1954-03-01',
    latitude: 11.415,
    longitude: 165.1619
  },{
    name: 'RDS-1',
    radius: 0,
    yeild: 22, 
    country: 'USSR',
    fillKey: 'RUS',
    significance: 'First fission weapon test by the USSR',
    date: '1949-08-29',
    latitude: 50.2615,
    longitude: 77.4851
  },{
    name: 'Joe 4',
    radius: 0,
    yeild: 400,
    country: 'USSR',
    fillKey: 'RUS',
    significance: 'First fusion weapon test by the USSR (not "staged")',
    date: '1953-08-12',
    latitude: 50.07,
    longitude: 78.43
  },{
    name: 'RDS-37',
    radius: 0,
    yeild: 1600,
    country: 'USSR',
    fillKey: 'RUS',
    significance: 'First "staged" thermonuclear weapon test by the USSR (deployable)',
    date: '1955-11-22',
    latitude: 50.07,
    longitude: 78.43

  },{
    name: 'Tsar Bomba',
    radius: 0,
    yeild: 50000,
    country: 'USSR',
    fillKey: 'RUS',
    significance: 'Largest thermonuclear weapon ever tested—scaled down from its initial 100 Mt design by 50%',
    date: '1961-10-31',
    latitude: 73.482,
    longitude: 54.5854
  }
]);

    //prep the data
    var yields = bombs.pluck('yeild');

    var min = d3.min( yields );
    var max = d3.max( yields );

    var scale = d3.scale.pow()
        .domain([min, max])
        .range([10, 45]);

    bombs.each(function(val, idx) {
        bombs.at(idx).set('radius', scale(val.get('yeild')));
    });

   $("#container10").datamap({
        scope: 'world',
        bubbles: bombs.toJSON(),
        bubble_config: {
            popupTemplate: _.template([
                '<div class="hoverinfo"><strong><%= data.name %></strong>',
                '<br/>Payload: <%= data.yeild %> kilotons',
                '<br/>Country: <%= data.country %>',
                '<br/>Date: <%= data.date %>',
                '</div>'].join(''))
        },
        geography_config: {
            popupOnHover: false,
            highlightOnHover: false
        },
        fills: {
            'USA': '#ffdd00',
            'RUS': '#0061f2',
            'PRK': '#ff7f0e',
            'PRC': '#000000',
            'IND': '#ff8b00',
            'GBR': '#8c564b',
            'FRA': '#d62728',
            'PAK': '#7f7f7f',
            defaultFill: '#002561'
        },
        data: {
            'RUS': {fillKey: 'RUS'},
            'PRK': {fillKey: 'PRK'},
            'CHN': {fillKey: 'PRC'},
            'IND': {fillKey: 'IND'},
            'GBR': {fillKey: 'GBR'},
            'FRA': {fillKey: 'FRA'},
            'PAK': {fillKey: 'PAK'},
            'USA': {fillKey: 'USA'}
        }
    });