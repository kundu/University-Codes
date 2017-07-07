/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//package dijkstratest;
import java.util.*;
import java.io.*;

/**
 *
 * @author FAYSAL
 */
public class DijkstraTest {
	public static int[][] G;
	public static int row;
	public static int col;
	public static int ver;
	public static int edge;
	public static int source;
	public static int visited[];
	public static int d[];

	public static int FindMinSource(int d[]) {
		int min = 999999;
		for (int c = 0; c < d.length; c++) {
			if (visited[c] == 0 && d[c] < min) {
				min = c;
			}
		}

		return min;
	}

	public static void calculateMinDistance(int[][] G, int source) {

		int w;
		for (int c = 0; c < col; c++) {
			if (G[source][c] > 0 && visited[c] == 0) {

				w = G[source][c] + d[source];
				if (w < d[c]) {
					d[c] = w;
				}
			}
		}
		visited[source]++;
	}

	public static void diajkstra() {
		for (int i = 1; i <= ver; i++) {
			int source = FindMinSource(d);
			calculateMinDistance(G, source);

		}

	}

	/**
	 * @param args
	 *            the command line arguments
	 */
	public static void main(String[] args) {
		File fileinput = new File("input.txt");
		File fileoutput = new File("result.txt");

		try {
			Scanner sc = new Scanner(fileinput);
			PrintWriter pw = new PrintWriter(fileoutput);
			row = sc.nextInt();
			col = row;
			ver = row;
			edge = sc.nextInt();
			G = new int[row][col];
			for (int c = 0; c < edge; c++) {
				int i = sc.nextInt();
				int j = sc.nextInt();
				G[i][j] = sc.nextInt();
				G[j][i] = G[i][j];
			}

			d = new int[ver];
			for (int i = 0; i < d.length; i++) {
				d[i] = 99999;
			}

			visited = new int[ver];

			int source = 0;
			d[source] = 0;
			diajkstra();
			for (int i = 0; i < d.length; i++) {
				pw.println(0 + "-->" + i + " " + d[i]);
			}

			sc.close();
			pw.close();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		}
		// TODO code application logic here
	}

}
