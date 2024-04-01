import 'dart:convert';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;

class SeatUpdateController extends GetxController{
Future<void> updateUnreservedSeats({required List unreservedSeats, required List data}) async {
  final item = data[0];
  final id = item['id'];
  try {
    var url = Uri.parse('http://192.168.153.1:81/api/$id');
    
    var response = await http.post(
      url,
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
      body: jsonEncode({
        'unreservedSeats': unreservedSeats,
      }),
    );

    if (response.statusCode == 200) {
      print('Unreserved seats updated successfully.');
    } else {
      print('Failed to update unreserved seats. Status code: ${response.statusCode}');
    }
  } catch (e) {
    print('Error updating unreserved seats: $e');
  }
}
}