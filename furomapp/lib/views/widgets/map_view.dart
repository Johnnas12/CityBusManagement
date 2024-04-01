import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class MapScreen extends StatefulWidget {
  @override
  _MapScreenState createState() => _MapScreenState();
}

class _MapScreenState extends State<MapScreen> {
  String mapImageUrl = '';

  @override
  void initState() {
    super.initState();
    getMapImageUrl();
  }

  Future<void> getMapImageUrl() async {
    final apiKey = 'An2UBBRkoLNJiPr8VDHJUv3SBJFDPp9ccuq6eXFD21s81BnW20ps4XD-kuOQ3-Ks';
    final queryParameters = {
      'mapSize': '500,300',
      'zoomLevel': '12',
      'key': apiKey,
      // Add other parameters as needed
    };

    final uri = Uri.https(
      'dev.virtualearth.net',
      '/REST/v1/Imagery/Map/Road',
      queryParameters,
    );

    final response = await http.get(uri);
    final data = jsonDecode(response.body);

    setState(() {
      mapImageUrl = data['resourceSets'][0]['resources'][0]['imageUrl'];
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Map Example'),
      ),
      body: mapImageUrl.isNotEmpty
          ? Image.network(mapImageUrl)
          : Center(child: CircularProgressIndicator()),
    );
  }
}