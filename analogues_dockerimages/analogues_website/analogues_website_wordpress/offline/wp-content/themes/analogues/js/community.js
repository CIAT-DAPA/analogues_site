
var map = L.map('map').setView([0, -15.00], 3);


L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var LeafIcon = L.Icon.extend({
    options: {        
        iconSize: [30, 30],
        iconAnchor: [10, 30],
        popupAnchor: [4, -30]
    }
});

var fotf = new LeafIcon({iconUrl: '../wp-content/uploads/icon-fotf.png'}),
        projects = new LeafIcon({iconUrl: '../wp-content/uploads/icon-project.png'}),
        trainees = new LeafIcon({iconUrl: '../wp-content/uploads/icon-trainees.png'});

// ------------- Projects
L.marker([17.607789, 8.08166], {icon: projects}).bindPopup("<b>Year:2013</b><br/>"+
"<b>Project:</b>Capacity building workshops on the analogue method, cataloguing climatic risk management strategies, understanding social and cultural barriers to adapting through farmer exchange visits between analogue sites.<br/>"+
"<b>Description:</b>Capacity building workshops on the analogue method, cataloguing climatic risk management strategies, understanding social and cultural barriers to adapting through farmer exchange visits between analogue sites.<br/> "+
"<b>Leader:RPL WA</b>").addTo(map);
L.marker([3.50177, -76.361517], {icon: projects}).bindPopup("<b>Year:2014</b><br/>"+
"<b>Project:</b>Analogue Tool - Continued development of the Climate Analogues R package and online tool<br/>"+
"<b>Description:</b>Successful validation of Climate Analogues methodology which will involve assessing the efficacy of Climate Analogues in connecting areas with similar agronomic potential, with soil data included resulting in a publication.<br/>"+
"<b>Leader:CIAT</b>").addTo(map);

// ------------- Trainees
L.marker([14.497, -14.452], {icon: trainees}).bindPopup("<b>Workshop - Dakar, Senegal</b><br/>"+
"<b>Date</b>:2012<br/>"+
"We held a second training session specifically for researchers and stakeholders in West Africa, funded by the CCAFS West Africa Regional Program, and organized in collaboration with the Senegal Meteorological Agency. We focused largely on the online version of the Analogues Tool, but also had sessions on the use of the Analogues R Package. We challenged local researchers to think about adaptation implications in the sites they worked. <br/>"+
"<img src='../wp-content/uploads/WS_2012_BurkinaFasoVillages.png' width='300' height='200'>").addTo(map);

L.marker([-1.2920, 36.8219], {icon: trainees}).bindPopup("<b>Workshop - Nairobi, Kenya</b><br/>"+
"<b>Date</b>:2012<br/>"+
"A third training session was done specifically for East African stakeholders, organized and funded by the CCAFS East Africa Regional Program. During this training we shared the Farms of the Future protocols, which were later applied in Kenya. We strongly focused on the concepts related to climate model uncertainty and the implications of such uncertainty for adaptation planning in agriculture. Researchers, government officials and local technicians were able to understand why it is to make decisions despite uncertainty.<br/>"+
"<img src='../wp-content/uploads/WS_2012_Kenia.png' width='300' height='200'>").addTo(map);

L.marker([27.7172, 85.3239], {icon: trainees}).bindPopup("<b>Workshop - Kathmandu, Nepal</b><br/>"+
"<b>Date</b>:2012<br/>"+
"The first ever training session of Analogues was held in Nepal, though it included a range of researchers from outside Nepal. Trainees from East and West Africa as well as from other countries in South Asia attended this training. The workshop provided overviews of and training in climate modeling techniques and tools, not only analogues but also downscaling, weather generators, and crop modeling.<br/>"+
"<img src='../wp-content/uploads/WS_2012_Nepal.png' width='300' height='200'>").addTo(map);

L.marker([-1.9705, 30.1044], {icon: trainees}).bindPopup("<b>Workshop - Kigali, Rwanda</b><br/>"+
"<b>Date</b>:2013<br/>"+
"The training in Rwanda originated from a special request of the Rwanda Agricultural Board (RAB). They contacted us for they needed to know how to use the Analogues Tool as well as the Farms of the Future approach. The main highlight during this workshop was the launch of the second version of the online tool. We also had the opportunity to explain with more detail the most recent updates to the R code.<br/>"+
"<img src='../wp-content/uploads/WS_2013_Rwanda.png' width='300' height='200'>").addTo(map);

L.marker([-0.023, 37.9061], {icon: trainees}).bindPopup("<b>Workshop - Nairobi, Kenia</b><br/>"+
"<b>Date</b>:2013<br/>"+
"After the training in Rwanda the Analogues team visited Kenya for the second time. This time, we had a lot of news. Foremost, the launch of the second version of the online tool. Additionally, we explained the newest R codes for the Farms of the Future approach. In this one-week workshop we realized that we needed to develop a desktop-based Analogues tool for those users without a good internet connection.<br/>"+
"<img src='../wp-content/uploads/WS_2013_Kenia.png' width='300' height='200'>").addTo(map);

L.marker([9.1011, -79.4028], {icon: trainees}).bindPopup("<b>Workshop - Panamá City, Panamá</b><br/>"+
"<b>Date</b>:2013<br/>"+
"The Food and Agriculture Organization of the United Nations (FAO) organized a special workshop about freely available tools for adaptation and mitigation in Latin American and Caribbean agriculture. The CCAFS Analogues team participated in this workshop with a session of one day to explain the concepts and the use of the Analogues online tool. This workshop gave us the opportunity to interact with government staff of different Caribbean countries and to receive feedback on the use of Analogues in policy contexts.<br/>"+
"<img src='../wp-content/uploads/WS_2013_Panama.png' width='300' height='200'>").addTo(map);

L.marker([-6.7923, 39.2083], {icon: trainees}).bindPopup("<b>Workshop - Dar es Salaam, Tanzania</b><br/>"+
"<b>Date</b>:2014<br/>"+
"The International Livestock Research Institute (ILRI), Bioversity International and the CCAFS East Africa Regional program organized a one-week training in Eastern Tanzania. Policy makers and researchers from National Agricultural Research and Extension Systems (NARES), Universities and Government Ministries in Tanzania learned about the CCAFS Analogues tool and its applications. In Dar es Salaam, we explained how use the user-friendly desktop version of Analogues for the first time.<br/>"+
"<img src='../wp-content/uploads/WS_2014_Tanzania.png' width='300' height='200'>").addTo(map);

// ------------- Farms Of The Future
L.marker([28.3948, 84.1240], {icon: fotf}).
        bindPopup("<b>FOTF - Beora, Nepal </b>        <br/>"+
"<b>Title:</b> Finding the future of Beora        <br/>"+
"<b>Project:</b> Systemic Integrated Adaptation Program (SIA)      <br/>"+
"<b>Partner:</b> Oxford University      <br/>"+
"<b>Town:</b>       <br/>"+
"<b>BlogPost:</b> <a href='https://ccafs.cgiar.org/blog/finding-future-farmers-beora-nepal' target='_blank'>https://ccafs.cgiar.org/blog/finding-future-farmers-beora-nepal</a>      <br/>"+
"<img src='../wp-content/uploads/FOTF_Nepal.jpg' width='200' height='300'>").addTo(map);

L.marker([-4.7986, 38.2902], {icon: fotf}).
        bindPopup("<b>FOTF - Lushoto, Tanzania</b>        <br/>"+
"<b>Title:</b> Farms of the Future hits Tanzania       <br/>"+
"<b>Project:</b>       <br/>"+
"<b>Partner:</b>  Natural Resources Institute, University of Greenwich     <br/>"+
"<b>Town:</b>   Yamba    <br/>"+
"<b>BlogPost:</b> <a href='http://www.ccafs-analogues.org/one-mans-future-is-another-mans-present-farms-of-the-future-hits-tanzania' target='_blank'>http://www.ccafs-analogues.org/one-mans-future-is-another-mans-present-farms-of-the-future-hits-tanzania/</a> and <a href='http://www.ccafs-analogues.org/fotf-report/' target='_blank'>http://www.ccafs-analogues.org/fotf-report/</a>     <br/>"+
"<img src='../wp-content/uploads/FOTF_Tanzania.jpg' width='300' height='200'>").addTo(map);

L.marker([10.5237, -2.7033], {icon: fotf}).
        bindPopup("<b>FOTF - Lawra-Jirapa, Ghana</b>        <br/>"+
"<b>Title:</b>  Farms of the future approach: Understanding social and cultural barriers to climate change adaption through farmer exchanges       <br/>"+
"<b>Project:</b>       <br/>"+
"<b>Partner:</b>  Savannah Agricultural Research Institute, Federation Nian Zwé, Fondation BioCarburant     <br/>"+
"<b>Town:</b>       <br/>"+
"<b>BlogPost:</b> <a href='https://ccafs.cgiar.org/research/projects/farms-future-approach-understanding-social-and-cultural-barriers-climate-change' target='_blank'>https://ccafs.cgiar.org/research/projects/farms-future-approach-understanding-social-and-cultural-barriers-climate-change </a>     <br/>"+
"<img src='../wp-content/uploads/FOTF_Ghana.png' width='300' height='200'>").addTo(map);

