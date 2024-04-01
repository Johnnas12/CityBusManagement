import 'package:flutter/material.dart';

class TermsPage extends StatelessWidget {
  final List<String> terms = [
    '1. Passengers must purchase a valid ticket before boarding the bus. Tickets can be purchased online, at ticket booths, or directly from the bus driver.',
    '2. Passengers must present their tickets upon request by the bus driver or authorized personnel.',
    '3. Passengers must board and alight the bus only at designated stops.',
    '4. Passengers should arrive at the bus stop at least 5 minutes before the scheduled departure time.',
    '5. Smoking, vaping, or consuming alcohol or illegal substances is strictly prohibited on the bus. 5',
    '6. Passengers must keep the bus clean and tidy by disposing of trash in designated bins.',
    '7. Passengers should remain seated while the bus is in motion and keep all body parts inside the bus at all times.', 
    '8.  In case of emergency, passengers should follow the instructions of the bus driver or bus staff and evacuate the bus in an orderly manner.' ,
    '9. Passengers are responsible for their personal belongings and should not leave valuables unattended on the bus.'
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Terms and Conditions'),
        leading: IconButton(
          icon: Icon(Icons.arrow_back),
          onPressed: () {
            Navigator.of(context).pop();
          },
        ),
      ),
      body: Padding(
        padding: const EdgeInsets.all(15.0),
        child: Container(
          height: 700,
          width: 500,
           decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(20.0),
                color: Color.fromARGB(255, 241, 141, 111),
                ),
          
          child: ListView.builder(
            itemCount: terms.length,
            itemBuilder: (context, index) {
              return ListTile(
                title: Text(
                  terms[index],
                  style: TextStyle(color: Color.fromARGB(255, 4, 3, 3)),
                ),
                onTap: () {
                  // Handle term tap
                },
              );
            },
          ),
        ),
      ),
    );
  }
}

