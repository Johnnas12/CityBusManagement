import 'package:flutter/material.dart';
import 'package:qr_flutter/qr_flutter.dart';

class QRCodeWidget extends StatelessWidget {
  final String status;
  QRCodeWidget({required  this.status});
  @override
  Widget build(BuildContext context) {
    // Data to be encoded into the QR code
    String data = status;

    // Define the desired size of the QR code
    double qrCodeSize = 80.0;

    return Center(
      child: QrImageView(
        data: data,
        version: QrVersions.auto,
        size: qrCodeSize,
      ),
    );
  }
}
