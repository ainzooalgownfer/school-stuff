cmake_minimum_required(VERSION 4.1)
project(PPIL_CPP_VISITEUR)

set(CMAKE_CXX_STANDARD 20)

add_executable(PPIL_CPP_VISITEUR src/Constante.cpp
                                 src/Expression.cpp
                                 src/Fois.cpp
                                 src/OpBinaire.cpp
                                 src/Plus.cpp
                                 src/TestVisiteurDerivee.cpp
                                 src/Variable.cpp
        headers/Visiteur.h
)

target_include_directories(PPIL_CPP_VISITEUR PRIVATE headers)