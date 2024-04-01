import 'package:flutter/material.dart';
import 'package:furomapp/views/home.dart';
import 'package:furomapp/views/seats.dart';
import 'package:get/get.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:flare_flutter/flare_actor.dart';

class SearchPageResult extends StatefulWidget {

   final List<dynamic> data;
   final String source;
   final String destination;
  
  const SearchPageResult({super.key, required this.data, required this.source, required this.destination});

  @override
  State<SearchPageResult> createState() => _SearchPageResultState();
  
}

class _SearchPageResultState extends State<SearchPageResult> {

bool _showAnimation = false;

  late String from = '';
  late String to = '';

  @override
  void initState() {
    super.initState();
    from = widget.source;
    to = widget.destination;
    if (widget.data.isEmpty) {
      setState(() {
        _showAnimation = true;
      });
    }
  }


  @override
  Widget build(BuildContext context) {
    final dataToSeat = widget.data;
    final item = widget.data.isNotEmpty ? widget.data[0] : null;

    final item1 = widget.data[0];
    String cleanedSeatData = item1['unreserved'].replaceAll('[', '').replaceAll(']', '');
    List<String> seatNumberStrings = cleanedSeatData.split(',');
    List<int> unreservedSeatNumbers = seatNumberStrings.map((seatNumberString) => int.parse(seatNumberString)).toList();
    return Scaffold(
      body: Padding(
        padding: const EdgeInsets.only(left: 10, right: 10, top: 30),
        child: Container(
          child: Column(
            children: [
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
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    IconButton(
                      icon: Icon(Icons.arrow_back),
                      onPressed:
                      (){Get.to(()=> const HomePage());} // Navigate back when back button is pressed
                      ,
                    ),
                     Text(
                      'Search Result',
                      style: GoogleFonts.poppins(fontSize: 26, color: Colors.black) ,
                    ),
                    Icon(Icons.language, color: Colors.black), // Your "search result" localization icon
                  ],
                ),
              ),

              SizedBox(height: 20), // Add margin between the two containers
              Container(
                width: 390,
                height: 118,

                margin: EdgeInsets.symmetric(horizontal: 5), // Adjust margin as needed
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(25),
                  color: Color(0xFFF68563),
                  boxShadow: [
                    BoxShadow(
                      color: Colors.grey.withOpacity(0.5),
                      spreadRadius: 5,
                      blurRadius: 7,
                      offset: Offset(0, 3), // changes position of shadow
                    ),
                  ],
                ),
                child: Center(
                  child: Text(
                    from + "-" + to, 
                    style: GoogleFonts.poppins(fontSize: 25),
                    textAlign: TextAlign.center,
                  ),
                ),
              ),   

              SizedBox(height: 40), 
              Container(
                width: 390,
                height: 490,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(25),
                  color: Color(0xFFF8D2C7), // Color F8D2C7
                ),
                
                child: item != null
          ? Column(
                  
                  children: [
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        Padding(
                          padding: EdgeInsets.all(8.0),
                          child: Row(
                            children: [
                              SizedBox(width: 15,),
                              Text(
                                'Bus Number - ${item['busnum']}' ,
                                style: GoogleFonts.poppins(fontSize: 23, color: Color(0xFFEA500F)),
                                
                              ),
                            ],
                          ),
                        ),
                        VerticalDivider(color: Colors.grey), // Grey line separator
                      ],
                    ),
                    Divider(color: Colors.grey), 

                                        Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        Padding(
                          padding: EdgeInsets.all(8.0),
                          child: Row(
                            children: [
                              SizedBox(width: 15,),
                              Text(
                                'Starting Point - ${item['from']}',
                                style: GoogleFonts.poppins(fontSize: 23, color: Color(0xFFEA500F)),
                                
                              ),
                            ],
                          ),
                        ),
                        VerticalDivider(color: Colors.grey), // Grey line separator
                      ],
                    ),
                    Divider(color: Colors.grey), 

                                        Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        Padding(
                          padding: EdgeInsets.all(8.0),
                          child: Row(
                            children: [
                              SizedBox(width: 15,),
                              Text(
                                'Via - ${item['via']}',
                                style: GoogleFonts.poppins(fontSize: 23, color: Color(0xFFEA500F)),
                                
                              ),
                            ],
                          ),
                        ),
                        VerticalDivider(color: Colors.grey), // Grey line separator
                      ],
                    ),
                    Divider(color: Colors.grey), 


                                        Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        Padding(
                          padding: EdgeInsets.all(8.0),
                          child: Row(
                            children: [
                              SizedBox(width: 15,),
                              Text(
                                'Departure Point - ${item['to']}',
                                style: GoogleFonts.poppins(fontSize: 23, color: Color(0xFFEA500F)),
                                
                              ),
                            ],
                          ),
                        ),
                        VerticalDivider(color: Colors.grey), // Grey line separator
                      ],
                    ),
                    Divider(color: Colors.grey), 
                                        Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        Padding(
                          padding: EdgeInsets.all(8.0),
                          child: Row(
                            children: [
                              SizedBox(width: 15,),
                              Text(
                                'Price/tarrif: - ${item['price']}',
                                style: GoogleFonts.poppins(fontSize: 23, color: Color(0xFFEA500F)),
                                
                              ),
                            ],
                          ),
                        ),
                        VerticalDivider(color: Colors.grey), // Grey line separator
                      ],
                    ),
                    Divider(color: Colors.grey), 

                                        Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        Padding(
                          padding: EdgeInsets.all(8.0),
                          child: Row(
                            children: [
                              SizedBox(width: 15,),
                              Text(
                                'Available Seats - ${item['availableseats']}',
                                style: GoogleFonts.poppins(fontSize: 23, color: Color(0xFFEA500F)),
                              
                              ),
                              SizedBox(width: 50,),
                              TextButton(
                                onPressed: ()=>{
                                Get.to(()=> SeatSelectionPage(data: dataToSeat, unreservedSeats: [1,2,3,4,5,6]))

                                //Get.to(()=> SeatSelectionPage(data: dataToSeat, unreservedSeats: unreservedSeatNumbers,))
                                },
                                child: Icon(
                                  Icons.arrow_forward,
                                  color:  Color(0xFFEA500F),
                                ))
                            ],
                          ),
                        ),
                        VerticalDivider(color: Colors.grey), // Grey line separator
                      ],
                    ),
                    Divider(color: Colors.grey), 
                                        Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        Padding(
                          padding: EdgeInsets.all(8.0),
                          child: Row(
                            children: [
                              SizedBox(width: 15,),
                              Text(
                                'Distance - ${item['distance']}',
                                style: GoogleFonts.poppins(fontSize: 23, color: Color(0xFFEA500F)),
                                
                              ),
                            ],
                          ),
                        ),
                        VerticalDivider(color: Colors.grey), // Grey line separator
                      ],
                    ),
                    
                  ],
                ):_showAnimation
                        ? FlareActor(
                            'assets/no_data_animation.flr', // Path to your Flare animation file
                            animation: '404 Animation', // Name of the animation within the Flare file
                            fit: BoxFit.contain,
                          )
                        : Center(
                            child: Text(
                              'No data',
                              style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ),
             

            //      Center(
            //   child: Text(
            //     'No data',
            //     style: TextStyle(
            //       fontSize: 18,
            //       fontWeight: FontWeight.bold,
            //     ),
            //   ),
            // ), 
               
              ),

            SizedBox(height: 20,), 

            Container(
                height: 50,
                width: 372,
                decoration: BoxDecoration(
                  color: Color(0xFFF36D44), // Custom color F36D44
                  borderRadius: BorderRadius.circular(25),
                ),
                child: TextButton(
                  onPressed: ()  {
                    Get.to(()=> SeatSelectionPage(data: dataToSeat, unreservedSeats: [1,2,3,4,5,6]));

                    //Get.to(()=> SeatSelectionPage(data: dataToSeat, unreservedSeats: unreservedSeatNumbers));
                    
                  },
                  child: Text(
                    'Make Reservation',
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
      ),
    );
  }
}