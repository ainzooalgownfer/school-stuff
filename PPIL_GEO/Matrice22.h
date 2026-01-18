#ifndef MATRICE22_H
#define MATRICE_H
#include <Vecteur2D.h>
#include <string>
#include <sstream>

class Matrice22
{
public:
    Vecteur2D ligneHaut, ligneBas;
    Matrice22(const Vecteur2D &ligneHaut, const Vecteur2D &ligneBas) : ligneHaut(ligneHaut), ligneBas(ligneBas) {}
    explicit Matrice22(const double &a11 = 1, const double &a12 = 0, const double &a21 = 0, const double &a22 = 1) : Matrice22(Vecteur2D(a11, a12), Vecteur2D(a21, a22)) {}

    static const Matrice22 creeRotation(const double &alfa)
    {
        double calfa = cos(alfa);
        double salfa = sin(alfa);

        return Matrice22(calfa, -salfa, salfa, calfa);
    }

    operator string() const
    {
        ostringstream o;
        o << ligneHaut << endl;
        o << ligneBas;
        return o.str();
    }

    //---opérations algébriques ---

    const Vecteur2D &operator*(const Vecteur2D &v) const
    {
        return Vecteur2D(ligneHaut * v, ligneBas * v);
    }
};

#endif