import 'dart:io';

import 'package:flutter/material.dart';

class MainClass extends StatefulWidget {
  const MainClass({Key? key}) : super(key: key);

  @override
  State<MainClass> createState() => _MainClassState();
}

class _MainClassState extends State<MainClass> {
  List<int> selectedSeats = [];

  void updateSelectedSeats(List<int> seats) {
    setState(() {
      selectedSeats = seats;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Container(
          child: Column(
            children: [
              //Text("Selected Seats: $selectedSeats"),
              SizedBox(height: 100,),
              NewOne(onSelectedSeatsChanged: updateSelectedSeats),
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

                         print(selectedSeats);

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
      ),
    );
  }
}

class NewOne extends StatefulWidget {
  final Function(List<int>) onSelectedSeatsChanged;
  const NewOne({Key? key, required this.onSelectedSeatsChanged})
      : super(key: key);

  @override
  State<NewOne> createState() => _NewOneState();
}

class _NewOneState extends State<NewOne> {
  List<int> selectedSeats = [1, 2, 3, 4, 5, 6];

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        // Simulating selection of seats
        selectedSeats.remove(6);
        selectedSeats.remove(5);
        // Call the callback function to update selected seats in MainClass
        widget.onSelectedSeatsChanged(selectedSeats);
        
      },
      child: Container(
        child: Text("Tap to select seats"),
      ),
    );
  }
}
