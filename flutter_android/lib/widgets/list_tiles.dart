import 'package:flutter/material.dart';
import '../config/config.dart';

class ListTiels {
  profileListTiels({required context}) {
    return ListTile(
      leading: const Icon(
        Icons.home,
        color: Colors.white,
      ),
      title: const Text(
        listTileMain,
        style: TextStyle(color: Colors.white),
      ),
      onTap: () {
        Navigator.pushNamed(context, '/');
      },
    );
  }

  signInListTiels({required context}) {
    return ListTile(
      leading: const Icon(Icons.sensor_door, color: Colors.white),
      title: const Text(listTileLogin, style: TextStyle(color: Colors.white)),
      onTap: () {
        Navigator.pushNamed(context, '/login');
      },
    );
  }

  registrationListTiels({required context}) {
    return ListTile(
      leading: const Icon(
        Icons.how_to_reg,
        color: Colors.white,
      ),
      title: const Text(listTileRegistration,
          style: TextStyle(color: Colors.white)),
      onTap: () {
        Navigator.pushNamed(context, '/registration');
      },
    );
  }
}
