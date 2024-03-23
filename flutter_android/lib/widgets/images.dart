import 'package:flutter/material.dart';

class Images {
  signInLogoImage() {
    return Container(
      margin: const EdgeInsets.fromLTRB(0, 0, 10, 0),
      child: const Image(image: AssetImage('assets/logo_mrt.png')),
    );
  }
}
