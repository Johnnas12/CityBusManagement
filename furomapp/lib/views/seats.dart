import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:furomapp/controllers/seatUpdate.dart';
import 'package:furomapp/views/finishing_up.dart';
import 'package:furomapp/views/purchase.dart';
import 'package:furomapp/views/test.dart';
import 'package:get/get.dart';
import 'package:google_fonts/google_fonts.dart';


class SeatSelectionPage extends StatefulWidget {
  final List <dynamic> data;
  List <dynamic> unreservedSeats;
 SeatSelectionPage({super.key, required this.data, required this.unreservedSeats});

  @override
  _SeatSelectionPageState createState() => _SeatSelectionPageState();
}

class _SeatSelectionPageState extends State<SeatSelectionPage> {
  final SeatUpdateController _seatUpdateController = Get.put(SeatUpdateController());
  List<int> selectedSeats = [1,2,3,4,5,6];

   List<dynamic> unreservedseats= [];
  void updateSelectedSeats(List<dynamic> seats) {
    setState(() {
      unreservedseats = seats;
    });
  }

  
  @override
  Widget build(BuildContext context) {
    final item = widget.data[0];
    //List<int> unreservedSeatNumbers= item['unreserved'];

    // String content = item['unreserved'].substring(1, item['unreserved'].length - 2);
    // List<String> stringList = content.split(',');
    // List<int> unreservedSeatNumbers = stringList.map(int.parse).toList();
    // unreservedSeatNumbers.removeLast();
    String dataWithoutBrackets = item['unreserved'].substring(1, item['unreserved'].length - 1);
    List<String> stringList1 = dataWithoutBrackets.split(',');
    List<int> unreservedSeatNumbers = stringList1.map((e) => int.parse(e)).toList();
 
  // String cleanedSeatData = item['unreserved'].replaceAll('[', '').replaceAll(']', '');
  // List<String> seatNumberStrings = cleanedSeatData.split(', ');
  // List<int> unreservedSeatNumbers = seatNumberStrings.map((seatNumberString) => int.parse(seatNumberString)).toList();
  print(widget.unreservedSeats);
    return Scaffold(
      appBar: AppBar(
        title: Text('Seat Selection'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(20.0),
        child: Column(
          children: [
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Row(
                      children: [
                        Container(
                          width: 10, // Adjust width as needed
                        height: 10, // Adjust height as needed
                        color: Colors.green,
                        ), 
                        SizedBox(width: 5), 
                        Text("unreserved", style: GoogleFonts.poppins(fontSize: 16),)
                      ],
                    ) ,

                      Row(
                      children: [
                        Container(
                          width: 10, // Adjust width as needed
                        height: 10, // Adjust height as needed
                        color: Colors.red,
                        ), 
                        SizedBox(width: 5), 
                        Text("Reserved", style: GoogleFonts.poppins(fontSize: 16),)
                      ],
                    )
                  ],
              ),
            ),
            Container(
              padding: EdgeInsets.all(15.0),
              decoration: BoxDecoration(
                color: Color(0XFFD9D9D9), 
                borderRadius: BorderRadius.circular(10), 
                boxShadow: [BoxShadow(
                    color: Colors.white.withOpacity(0.5),
                      spreadRadius: 5,
                      blurRadius: 7,
                      offset: Offset(0, 3),)]
                
              ),
              child: Column(
                children: [
                 Row(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      Seat(number: 1, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats , ),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 2, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      Spacer(), // To fill available space
                      Seat(number: 3, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20, ), // Space between seats
                      Seat(number: 4, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                    ],
                  ),
                  SizedBox(height: 20), // Space between rows
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      Seat(number: 5, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 6, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      Spacer(), // To fill available space
                      Seat(number: 7, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 8, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                    ],
                  ),
                  // Add more rows as needed
                  SizedBox(height: 20), // Space between rows
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      Seat(number: 9, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 10, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      Spacer(), // To fill available space
                      Seat(number: 11, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 12, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                    ],
                  ),

                  SizedBox(height: 20), // Space between rows
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      Seat(number: 13, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 14, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      Spacer(), // To fill available space
                      Seat(number: 15, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 16, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                    ],
                  ),


                  SizedBox(height: 20), // Space between rows
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      Seat(number: 17, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 18, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      Spacer(), // To fill available space
                      Seat(number: 19, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 20, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                    ],
                  ),

                  SizedBox(height: 20), // Space between rows
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      Seat(number: 21, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 22, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      Spacer(), // To fill available space
                      Seat(number: 23, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20, ), // Space between seats
                      Seat(number: 24, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                    ],
                  ),
                  SizedBox(height: 20), // Space between rows
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      Seat(number: 25, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 26, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      Spacer(), // To fill available space
                      Seat(number: 27, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 28, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                    ],
                  ),
                  SizedBox(height: 20), // Space between rows
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      Seat(number: 29, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 30, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      Spacer(), // To fill available space
                      Seat(number: 31, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 32, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                    ],
                  ),
                  SizedBox(height: 20), // Space between rows
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      Seat(number: 33, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 20), // Space between seats
                      Seat(number: 34, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 5), // Space between seats
                      Seat(number: 35, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 5), // Space between seats
                       Seat(number: 36, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                       SizedBox(width: 5),
                      Seat(number: 37, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                      SizedBox(width: 15), // Space between seats
                      Seat(number: 38, unreserved: unreservedSeatNumbers, data: widget.data, onSelectedSeatsChanged: updateSelectedSeats),
                       // To fill available space
                     
                    ],
                  ),
                ],
              ),
            ),
            
            Container(
                margin: EdgeInsets.only(top: 10),
                height: 35,
                width: 372,
                decoration: BoxDecoration(
                  color: Color.fromARGB(255, 225, 4, 4), // Custom color F36D44
                  borderRadius: BorderRadius.circular(25),
                ),
                child: TextButton(
                  onPressed: () async {
                     await _seatUpdateController.updateUnreservedSeats(
                           data: widget.data , 
                          unreservedSeats: unreservedseats );
                          Get.to(PurchasePage(data: widget.data,));
                         //print(unreservedseats);
                  },
                  child: Text(
                    'Select Seat',
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
    );
  }
}

class Seat extends StatefulWidget {
  final int number;
  final List<dynamic> unreserved;
  final List <dynamic> data;
  final Function(List<dynamic>) onSelectedSeatsChanged;
  //final Function(List<dynamic>) onDataSent;

  Seat({required this.number, required this.unreserved, required  this.data, required this.onSelectedSeatsChanged});

  @override
  _SeatState createState() => _SeatState();
}

class _SeatState extends State<Seat> {
  bool isSelected = false;
 
 
  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        setState(() {
          isSelected = !isSelected;
        });
        widget.unreserved.remove(widget.number);
        widget.onSelectedSeatsChanged(widget.unreserved);
        //widget.onDataSent(widget.unreserved);
        //SeatSelectionPage(data: widget.data, unreservedSeats: widget.unreserved);
        //print(widget.unreserved);

      // widget.sendDataToMain(widget.unreserved);
        
      },
      child: Container(
        decoration: BoxDecoration(
          //color: isSelected  ? Colors.red : Colors.green,
          color: !widget.unreserved.contains(widget.number) || isSelected ? Colors.red : Colors.green,
          borderRadius: BorderRadius.circular(8),
        ),
        padding: EdgeInsets.all(16),
        child: Text(
          '${widget.number}',
          style: TextStyle(
            color: Colors.white,
            fontWeight: FontWeight.bold,
          ),
        ),
      ),
    );
  }
}
