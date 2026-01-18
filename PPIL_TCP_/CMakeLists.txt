cmake_minimum_required(VERSION 3.20)
project(PPIL_TCP_ CXX)

set(CMAKE_CXX_STANDARD 17)

# --- TARGET 1: THE CLIENT ---
# Uses main.cpp and your error class
add_executable(Client_App main.cpp error.cpp error.h)
target_link_libraries(Client_App ws2_32)

# --- TARGET 2: THE SERVER ---
# Uses only Server.cpp
add_executable(Server_App Server.cpp)
target_link_libraries(Server_App ws2_32)