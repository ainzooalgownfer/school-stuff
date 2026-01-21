import java.io.*;
import java.net.*;

public class TcpServer {
    public static void main(String[] args) {
        int port = 8080; // Must match your C++ client port

        try (ServerSocket serverSocket = new ServerSocket(port)) {
            System.out.println("Server is listening on port " + port);

            while (true) {
                // Wait for C++ client to connect
                Socket socket = serverSocket.accept();
                System.out.println("New client connected");

                // Set up input and output streams
                InputStream input = socket.getInputStream();
                BufferedReader reader = new BufferedReader(new InputStreamReader(input));

                OutputStream output = socket.getOutputStream();
                PrintWriter writer = new PrintWriter(output, true);

                // Read message from C++ client
                String text = reader.readLine();
                System.out.println("Received: " + text);

                text = text.toUpperCase();

                // Send response back
                writer.println("Server received: " + text);

                socket.close();
            }
        } catch (IOException ex) {
            System.out.println("Server exception: " + ex.getMessage());
            ex.printStackTrace();
        }
    }
}