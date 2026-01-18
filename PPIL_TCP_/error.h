//
// Created by moham on 12/01/2026.
//

#ifndef PPIL_TCP__ERROR_H
#define PPIL_TCP__ERROR_H
using namespace std;

#include <string>
#include <iostream>

class Erreur
{
public:
    const static int LONGUEURMESSAGE = 100;
    char message[1+LONGUEURMESSAGE];
    Erreur();
    Erreur(const char * messageErreur);

    operator string() const;
};

ostream & operator << (ostream & os, const Erreur & erreur);
#endif //PPIL_TCP__ERROR_H