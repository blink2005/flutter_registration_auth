import 'package:flutter/material.dart';
import '../config/config.dart';
import '../widgets/app_bars.dart';
import '../widgets/drawers.dart';

class MainPage extends StatelessWidget {
  MainPage({super.key});

  @override
  Widget build(BuildContext context) {
    AppBars appBars = AppBars();
    Drawers drawers = Drawers();

    return MaterialApp(
        home: Scaffold(
            appBar: appBars.mainAppBar(context),
            backgroundColor: const Color.fromRGBO(48, 48, 48, 1),
            body: const Center(
                child: Text(mainPage,
                    style: TextStyle(color: Colors.white, fontSize: 25))),
            drawer: drawers.mainPageDrawer(context: context)));
  }
}
