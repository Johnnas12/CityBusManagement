import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:furomapp/controllers/ticket.dart';
import 'package:furomapp/controllers/ticketrefresh.dart';
import 'package:furomapp/views/about_us.dart';
import 'package:furomapp/views/lost_and_found.dart';
import 'package:furomapp/views/search_page.dart';
import 'package:furomapp/views/terms.dart';
import 'package:furomapp/views/widgets/bottom_navigator.dart';
import 'package:furomapp/views/widgets/input_widget.dart';
import 'package:furomapp/views/widgets/map_view.dart';
import 'package:furomapp/views/widgets/qr_widget.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:furomapp/controllers/search.dart';
import 'package:furomapp/views/profile.dart';
import 'package:intl/intl.dart';
import 'package:shared_preferences/shared_preferences.dart';

class HomePage extends StatefulWidget {
  const HomePage({super.key});
  
  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  final TextEditingController _startingController = TextEditingController();
  final TextEditingController _destinationController = TextEditingController();
  final  TicketRefresh _ticketRefresh = Get.put(TicketRefresh());
  //SharedPreferences prefs = await SharedPreferences.getInstance();
 // final userData = GetStorage().read('user');
  //final userData = GetStorage().read('user') as Map<dynamic, dynamic>;
  final box = GetStorage();
  //final SearchController _searchController = Get.put(SearchController());
  int _currentIndex = 0;

  void _onTap(int index) {
    setState(() {
      _currentIndex = index;
    });
  }

  final SearchResultController _searchResultController =
      Get.put(SearchResultController());

  @override
  Widget build(BuildContext context) {
    var userdata =  box.read('user');
    var tickets = box.read('tickets');
    //var tickets = _ticketRefresh.getDataList();

      
    //SharedPreferences prefs = await SharedPreferences.getInstance();
    //String? tickets = prefs.getString('tickets');
    //var user = jsonDecode(userdata);

    return Scaffold(
      body: _currentIndex == 0
          ? SingleChildScrollView(
              child: Container(
                //backgroundColor: ,

                child: Column(
                  children: [
                    Container(
                      decoration: BoxDecoration(
                          borderRadius: BorderRadius.only(
                            bottomLeft: Radius.circular(50.0),
                            bottomRight: Radius.circular(50.0),
                          ),
                          color: Color(0xFFF36D44)),
                      // color: Color(0xFFF36D44),
                      height: 350,
                      child: Column(
                        children: [
                          Container(
                            margin:
                                EdgeInsets.only(left: 20, right: 20, top: 30),
                            child: Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                SizedBox(
                                  width: 10,
                                ),
                                Text(
                                  "Anbessa City Bus",
                                  style: GoogleFonts.poppins(
                                      fontSize: 32, color: Color(0xFFFFE606)),
                                ),
                                Icon(
                                  Icons.language,
                                  color: Color(0xFFFFE606),
                                )
                              ],
                            ),
                          ),
                          Image(
                            image: AssetImage('assets/img/logo.jpg'),
                            height: 200,
                          ),
                        ],
                      ),
                    ),
                    Container(
                      transform: Matrix4.translationValues(0.0, -50.0, 0.0),
                      height: 280.0,
                      width: 360.0,
                      decoration: BoxDecoration(
                        color: Colors.white,
                        borderRadius: BorderRadius.circular(20.0),
                        boxShadow: [
                          BoxShadow(
                            color: Colors.black.withOpacity(0.2),
                            spreadRadius: 5,
                            blurRadius: 10,
                            offset: Offset(0, 3),
                          ),
                        ],
                      ),
                      child: Padding(
                        padding: const EdgeInsets.all(20.0),
                        child: Column(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: [
                            Row(
                              mainAxisAlignment: MainAxisAlignment.center,
                              children: [
                                Icon(
                                  Icons.flight,
                                  size: 30.0,
                                  color: Color(0xFFFFE606),
                                ),
                                SizedBox(width: 10.0),
                                Flexible(
                                  child: TextFormField(
                                    controller: _startingController,
                                    decoration: const InputDecoration(
                                        border: UnderlineInputBorder(
                                            borderSide:
                                                BorderSide(color: Colors.grey)),
                                        focusedBorder: UnderlineInputBorder(
                                          borderSide: BorderSide(
                                              color: Colors
                                                  .grey), // Focused bottom border color
                                        ),
                                        labelText: 'Starting From',
                                        labelStyle: TextStyle(
                                            color: Colors.grey, fontSize: 20)),
                                  ),
                                ),
                              ],
                            ),
                            Row(
                              mainAxisAlignment: MainAxisAlignment.center,
                              children: [
                                Icon(
                                  Icons.location_on,
                                  size: 30.0,
                                  color: Color(0xFFFFE606),
                                ),
                                SizedBox(width: 10.0),
                                Flexible(
                                  child: TextFormField(
                                    controller: _destinationController,
                                    decoration: const InputDecoration(
                                        border: UnderlineInputBorder(
                                            borderSide:
                                                BorderSide(color: Colors.grey)),
                                        focusedBorder: UnderlineInputBorder(
                                          borderSide: BorderSide(
                                              color: Colors
                                                  .grey), // Focused bottom border color
                                        ),
                                        labelText: 'Departure',
                                        labelStyle: TextStyle(
                                            color: Colors.grey, fontSize: 20)),
                                  ),
                                ),
                              ],
                            ),
                          ],
                        ),
                      ),
                    ),
                    Container(
                      height: 50,
                      width: 372,
                      decoration: BoxDecoration(
                        color: Color(0xFFF36D44), // Custom color F36D44
                        borderRadius: BorderRadius.circular(25),
                      ),
                      child: TextButton(
                        onPressed: () async {
                          await _searchResultController.SearchResult(
                              from: _startingController.text.trim(),
                              to: _destinationController.text.trim()); 
                        },
                        child: Text(
                          'Search Bus',
                          style: TextStyle(
                            color: Colors.white,
                            fontSize: 18,
                          ),
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            )
          : _currentIndex == 1
              ? Padding(
                  padding: const EdgeInsets.only(left: 10, right: 10, top: 30),
                  child: Container(
                      child: Column(children: [
                    Container(
                      width: 399,
                      height: 56,
                      decoration: BoxDecoration(
                        borderRadius: BorderRadius.circular(25),
                        boxShadow: [
                          BoxShadow(
                            color: Colors.grey.withOpacity(0.5),
                            spreadRadius: 5,
                            blurRadius: 7,
                            offset: Offset(0, 3), // changes position of shadow
                          ),
                        ],
                        color: Color(0xFFF36D44),
                      ),
                      padding: EdgeInsets.symmetric(horizontal: 16),
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          // IconButton(
                          //   icon: Icon(Icons.arrow_back),
                          //   onPressed:
                          //   (){Get.to(()=> const HomePage());} // Navigate back when back button is pressed
                          //   ,
                          // ),
                          SizedBox(
                            width: 32,
                          ),
                          Text(
                            'Anbessa city Bus',
                            style: GoogleFonts.poppins(
                                fontSize: 26,
                                color: Color.fromARGB(201, 243, 223, 45)),
                          ),
                          Icon(Icons.language,
                              color: Color.fromARGB(201, 243, 223,
                                  45)), // Your "search result" localization icon
                        ],
                      ),
                    ),
                    SizedBox(
                      height: 30,
                    ),
                    Container(
                      child: Image(
                        image: AssetImage('assets/img/logo.jpg'),
                        height: 200,
                      ),
                    ),
                    Container(
                        height: 300.0,
                        width: 360.0,
                        decoration: BoxDecoration(
                          color: Colors.white,
                          borderRadius: BorderRadius.circular(20.0),
                          boxShadow: [
                            BoxShadow(
                              color: Colors.black.withOpacity(0.2),
                              spreadRadius: 5,
                              blurRadius: 10,
                              offset: Offset(0, 3),
                            ),
                          ],
                        ),
                        child: Column(
                          children: [
                            Row(
                              children: [
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.info), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        // Add your onPressed action here
                                        Get.to(AboutUsPage());
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      'About us', // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                ), 
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.help), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        Get.to(LostAndFoundPage());
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      'Report Lost', // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                ), 
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.description), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        Get.to(TermsPage());
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      'Terms', // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                )
                              ],
                            ), 

                            Row(
                              children: [
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.edit_off_outlined), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        // Add your onPressed action here
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      'Services', // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                ), 
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.developer_mode), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        // Add your onPressed action here
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      'Developers', // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                ), 
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.update), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        // Add your onPressed action here
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      'Version 1.0', // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                )
                              ],
                            )
                          ],
                        )
                        ),

                        SizedBox(height: 25), 
                            TextButton(onPressed: (){ Get.to(()=>  MapScreen());}, child: Text(
                        "Here you are", style: GoogleFonts.poppins(fontSize: 30)
                      )), 
                  ])))
              : _currentIndex == 2
                  ? Padding(
                    padding: const EdgeInsets.all(15.0),
                    child: Container(

                      child: Column(
                        children: [
                          SizedBox(height: 25.0,),
                                    Container(
                                    width: 399,
                                    height: 56,
                                    decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(25),
                    boxShadow: [
                      BoxShadow(
                        color: Colors.grey.withOpacity(0.5),
                        spreadRadius: 5,
                        blurRadius: 7,
                        offset: Offset(0, 3), // changes position of shadow
                      ),
                    ],
                    color: Colors.white,
                                    ),
                    padding: EdgeInsets.symmetric(horizontal: 16),
                    child: Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      SizedBox(width: 120,),
                       Text(
                        'Tickets',
                        style: GoogleFonts.poppins(fontSize: 26, color: Colors.black) ,
                      ), 
                      SizedBox(width: 90,),
                      IconButton(onPressed:  ()async{
                        await _ticketRefresh.ticketRefresh(id: userdata['id']);
                        tickets = (GetStorage().read('tickets'));
                        print(tickets);
                      }, 
                      icon:Icon(Icons.refresh) )
                    ],
                   ),
                  ),
                  SizedBox(height: 25,),
                 // Center(
                  Container(
                    child: GetBuilder <TicketRefresh>(
                      builder: (_ticketRefresh) {
                      //final tickets = _ticketRefresh.getDataList();
                      return  Container (
                         height: 600,
                          child: ListView.builder(
                          itemCount: tickets.length,
                          itemBuilder: (context, index) {
                            var ticket = tickets[index];
                            return Container(
                            height: 300,
                            width: 400,
                            margin: EdgeInsets.only(bottom: 20),
                            decoration : BoxDecoration(
                            color: Color(0xFFF36D44),
                            borderRadius: BorderRadius.circular(25.0),
                            boxShadow: [
                              BoxShadow(
                                color: Colors.black.withOpacity(0.2),
                                spreadRadius: 5,
                                blurRadius: 10,
                                offset: Offset(0, 3),
                              )
                            ],  
                            ), 
                            child: Column(
                              children: [
                                Text(
                                  "${ticket['from']} - ${ticket['to']}", 
                                  style: GoogleFonts.poppins(fontSize: 30, fontWeight: FontWeight.bold),
                                ), 
                                Text(
                                  "Ticket ID - ${ticket['ticketID']} " ,
                                  style: GoogleFonts.poppins(fontSize: 20, fontWeight: FontWeight.w500),
                                ), 
                                 Text(
                                  'Date: ${ DateFormat('yyyy-MM-dd').format(DateTime.parse(ticket['created_at']))}' ,
                                  style: GoogleFonts.poppins(fontSize: 20, fontWeight: FontWeight.w500),
                                ), 
                                  Text(
                                  "Price- ${ticket['price']}" ,
                                  style: GoogleFonts.poppins(fontSize: 20, fontWeight: FontWeight.w500),
                                ), 
                                  Text(
                                  "Status - ${ticket['status']}" ,
                                  style: GoogleFonts.poppins(fontSize: 20, fontWeight: FontWeight.w500),
                                ),
                                QRCodeWidget(status: ticket['status'],)
                              ],
                            ),
                          );
                          },
                         
                          ),
                      
                        );
                      }
                    ),
                  ),
                  
                   

                    
                 // )
                ],
              ),
            ),
          )



          : Padding(
              padding: EdgeInsets.all(20.0),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  CircleAvatar(
                    radius: 80.0,
                    backgroundImage:
                        NetworkImage('https://via.placeholder.com/150'),
                  ),
                  SizedBox(height: 20.0),
                  Text(
                    //userData["user"]["id"],
                  // box.read('user'),
                    userdata['name'],
                    style: TextStyle(
                      fontSize: 24.0,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(height: 10.0),
                  Text(
                    userdata['username'],
                    style: TextStyle(
                      fontSize: 18.0,
                      color: Colors.grey[700],
                    ),
                  ),
                  SizedBox(height: 20.0),
                  Divider(color: Colors.grey),
                  SizedBox(height: 20.0),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Row(
                        children: [
                          Icon(Icons.email, color: Colors.blue),
                          SizedBox(width: 10.0),
                          Text(
                            userdata['email'],
                            style: TextStyle(
                              fontSize: 16.0,
                              color: Colors.black,
                            ),
                          ),
                        ],
                      ),
                      Row(
                        children: [
                          Icon(Icons.phone, color: Colors.blue),
                          SizedBox(width: 10.0),
                          Text(
                            userdata['phone'],
                            style: TextStyle(
                              fontSize: 16.0,
                              color: Colors.black,
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                  SizedBox(height: 20.0),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Row(
                        children: [
                          Icon(Icons.location_on, color: Colors.blue),
                          SizedBox(width: 10.0),
                          Text(
                            'New York, USA',
                            style: TextStyle(
                              fontSize: 16.0,
                              color: Colors.black,
                            ),
                          ),
                        ],
                      ),
                      Row(
                        children: [
                          Icon(Icons.cake, color: Colors.blue),
                          SizedBox(width: 10.0),
                          Text(
                            'Jan 01, 1990',
                            style: TextStyle(
                              fontSize: 16.0,
                              color: Colors.black,
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                ],
              ),
            ),
      bottomNavigationBar: CustomBottomNavigationBar(
        currentIndex: _currentIndex,
        onTap: _onTap,
      ),
    );
  }
}
