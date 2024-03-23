import 'package:flutter/material.dart';
import '../widgets/list_tiles.dart';

class Drawers {

  ListTiels listTiels = ListTiels();

  mainPageDrawer({required context}) {
    return Drawer(
      backgroundColor: const Color.fromRGBO(0, 186, 120, 1),
      child: ListView(
        padding: EdgeInsets.zero,
        children: [Container(margin: const EdgeInsets.fromLTRB(0, 50, 0, 0),child: Column(children: [
          listTiels.profileListTiels(context: context),
          listTiels.signInListTiels(context: context),
          listTiels.registrationListTiels(context: context)
        ]))],
      ),
    );
  }
}
