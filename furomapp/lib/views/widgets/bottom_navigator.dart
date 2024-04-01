import 'package:flutter/material.dart';
import 'package:furomapp/views/profile.dart';


class CustomBottomNavigationBar extends StatelessWidget {
  final int currentIndex;
  final Function(int) onTap;

  const CustomBottomNavigationBar({super.key, required this.currentIndex, required this.onTap});

  @override
 Widget build(BuildContext context) {
    return  Container(
      padding: EdgeInsets.only(left: 5, right: 5, bottom: 5),
      height: 90,
      decoration: BoxDecoration(
        color: Colors.white, // Set your desired background color
        boxShadow: [
          BoxShadow(
            color: Colors.black.withOpacity(0.2),
            spreadRadius: 2,
            blurRadius: 20,
            offset: Offset(0, 3), // Adjust the offset to control the shadow direction
          ),
        ],
      
      ),
      child: BottomNavigationBar(
        
        currentIndex: currentIndex,
        onTap: onTap,
        selectedItemColor:  Color(0xFFF36D44), // Set the color for the selected item
        unselectedItemColor: Colors.grey, // Set the color for unselected items
        selectedFontSize: 16.0, // Set the font size for the selected item
        unselectedFontSize: 14.0, // Set the font size for unselected items
        type: BottomNavigationBarType.fixed, // Use fixed type if you have more than 3 items
        items: [
          BottomNavigationBarItem(
            icon: Icon(Icons.home),
            label: 'Home',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.search),
            label: 'Search',
          ),
       
          BottomNavigationBarItem(
            icon: Icon(Icons.confirmation_number),
            label: 'Ticket',
          ),
             BottomNavigationBarItem(
            icon: Icon(Icons.person),
            label: 'Profile',
          ),
        ],
      ),
    );

  }
}
