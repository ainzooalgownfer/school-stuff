//
// Created by moham on 20/01/2026.
//

#ifndef PPIL_CPP_VISITEUR_VISITEUR_H
#define PPIL_CPP_VISITEUR_VISITEUR_H
#include "Constante.h"
#include "Expression.h"
#include "Fois.h"
#include "Plus.h"
class Variable;
class Constante;
class Plus;
class Fois;

class Visiteur {

public:
    virtual ~Visiteur()=default;

    virtual  Expression* visite(Constante& c) =0;
    virtual  Expression* visite(Variable& v) =0;
    virtual Expression* visite(Plus& p) = 0;
    virtual Expression* visite(Fois& f) = 0;
};

class VisiteurDerivee : public Visiteur {
    public:
    // La dérivée de x est 1
    Expression* visite(Variable& v) override {
        return new Constante(1.0);
    }

    // La dérivée de k est 0
    Expression* visite(Constante& c) override {
        return new Constante(0.0);
    }

    // (f + g)' = f' + g'
    Expression* visite(Plus& p) override {
        Expression* f_prime = p.getGauche()->accept(*this);
        Expression* g_prime = p.getDroit()->accept(*this);
        return new Plus(f_prime, g_prime);
    }

    // (f * g)' = f' * g + f * g'
    Expression* visite(Fois& f) override {
        Expression* f_expr = f.getGauche()->clone();
        Expression* g_expr = f.getDroit()->clone();

        Expression* f_prime = f.getGauche()->accept(*this);
        Expression* g_prime = f.getDroit()->accept(*this);

        // Construction de (f' * g) + (f * g')
        return new Plus(
            new Fois(f_prime, g_expr),
            new Fois(f_expr, g_prime)
        );
    }


};

#endif //PPIL_CPP_VISITEUR_VISITEUR_H