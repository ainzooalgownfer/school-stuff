/**
Représente un couple de coordonnées, un point du pl, un nombre complexe ect
*/
#ifndef VECTEUR_2D.H
#define VECTEUR_2D .H

#include <sstream>
#include <string>
#include <cmath>
using namespace std;

class Vecteur2D
{
public:
    double _x, _y;
    explicit Vecteur2D(const double &x = 0, const double &y = 0) : _x(x), _y(y) { /* rien à faire*/ /*x = 3;*/ }

    operator string() const
    {
        ostringstream o;
        o << "( " << _x << ", " << this->_y << ")";
        return o.str();
    }

    //-----opération algébrique -----
    const Vecteur2D operator+(const Vecteur2D &v) const
    {
        return Vecteur2D(_x + v._x, _y + v._y);
    }

    Vecteur2D operator-() const
    {
        return Vecteur2D(-_x, -_y);
    }

    Vecteur2D operator-(const Vecteur2D &v) const
    {
        return *this + (-v);
    }

    const Vecteur2D &operator+=(const Vecteur2D &v)
    {
        _x += v._x;
        _y += v._y;
        return *this;
    }

    const Vecteur2D operator*(const double &a) const
    {
        return Vecteur2D(_x * a, _y * a);
    }
    /**
    Produit scalaire
    */
    double operator*(const Vecteur2D &v) const
    {
        return _x * v._x + _y * v._y;
    }

    double norme2() const
    {
        return *this * *this;
    }

    double norme() const
    {
        return sqrt(this->norme2());
    }
};

inline Vecteur2D operator*(const double a, const Vecteur2D &v)
{
    return v * a;
}

inline ostream &operator<<(ostream &o, const Vecteur2D &v)
{
    o << (string)v;
    return o;
};

#endif