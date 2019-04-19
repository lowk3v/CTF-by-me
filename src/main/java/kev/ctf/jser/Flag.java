package kev.ctf.jser;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;

/**
 * Created by IntelliJ IDEA
 *
 * @Author: kev
 * @Date: 12:29 19/04/2019
 * @Version: 1.0
 */
public class Flag extends UserModel {
    private String flag_here = "/tmp/jser_flag";
    public Flag(){
        StringBuilder sb = new StringBuilder();
        try (BufferedReader br = Files.newBufferedReader(Paths.get(this.flag_here))) {
            String line;
            while ((line = br.readLine()) != null) {
                sb.append(line).append("\n");
            }
        } catch (IOException e) {
            System.err.format("IOException: %s%n", e);
        }
        this.username = sb.toString();
    }
}
