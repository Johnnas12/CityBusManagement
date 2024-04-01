import 'package:flutter/material.dart';
import 'package:furomapp/controllers/payment.dart';
import 'package:furomapp/controllers/ticket.dart';
import 'package:furomapp/views/home.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:google_fonts/google_fonts.dart';


class PurchasePage extends StatefulWidget {
  final List <dynamic> data;
  final box = GetStorage();
  PurchasePage({required  this.data});
  @override
  _PurchasePageState createState() => _PurchasePageState();
}

class _PurchasePageState extends State<PurchasePage> {
   
  final PaymentController _paymentController =  Get.put(PaymentController());
  final TicketController _ticketController = Get.put(TicketController());

  @override
  Widget build(BuildContext context) {
    var userData = widget.box.read('user');
    final item = widget.data.isNotEmpty ? widget.data[0] : null;
    //var data1 = widget.data[0];
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        title: Text('Purchase Ticket'),
        backgroundColor: Colors.white,
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Icon(
              Icons.done_outline,
              size: 100,
              color: Color(0xFFF36D44),
            ),
            SizedBox(height: 20),
            Text(
              'Congratulations!',
              style: TextStyle(
                fontSize: 24,
                fontWeight: FontWeight.bold,
              ),
            ),
           
            SizedBox(height: 40),
            ElevatedButton(
              onPressed: ()  async{

                await _paymentController.Pay(data: widget.data);
                _ticketController.getTicket(routeID: item['id'], passengerID: userData['id'], start: item['starttime'], departure: item['departuretime'], from: item['from'], to: item['to']);
                // Action to be performed when the button is pressed
                // For example, navigate to the ticket details page
               // print(item['price']);
               // print(userData);
               print(item['id']);

              },
              child: Text(
                'Purchase Your Ticket',
                style: TextStyle(fontSize: 18, color: Colors.white),
                
              ),
              style: ElevatedButton.styleFrom(
                padding: EdgeInsets.symmetric(horizontal: 40, vertical: 15),
                primary: Color(0xFFF36D44),
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(30),
                ),
              ),
            ),
           TextButton(onPressed: (){ Get.to(()=> const HomePage());}, child: Text(
                    "Go Back To Home", style: GoogleFonts.poppins(fontSize: 14)
                  )),
          ],
        ),
      ),
    );
  }
}


