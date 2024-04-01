import 'package:flutter/material.dart';
import 'package:furomapp/views/home.dart';
//import 'package:furomapp/constants/constants.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:get_storage/get_storage.dart';
import 'package:shared_preferences/shared_preferences.dart';
class TicketRefresh extends GetxController{

var tickets  ;
 getDataList() {
   return tickets;
  }

Future<String?> ticketRefresh({required int id}) async {
  final box = GetStorage();

  try{
        
      var url = Uri.parse('http://192.168.153.1:81/api/refresh/$id');
        var response = await http.post(
          url,
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
             },);

            print('Response status code: ${response.statusCode}');
            


        if (response.statusCode == 200) {
          var responseData = jsonDecode(response.body);
         // var token1 = responseData['token'];
           var ticket = responseData['data'];
           print('Response body: ${response.body}');
           await box.write('tickets', ticket);
           var printable = await box.read('tickets');
            tickets = ticket;
            //print(printable);

            Get.offAll(HomePage());
             Get.snackbar(
            'Success',
            responseData['message'],
            snackPosition: SnackPosition.TOP,
            backgroundColor: Colors.green,
            colorText: Colors.white,
          );
        } else {
          
        var responseData = json.decode(response.body);
      }

        } catch (e){
     
        print(e.toString());
        }
        
      }

}