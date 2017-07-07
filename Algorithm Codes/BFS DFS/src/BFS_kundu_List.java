import java.io.File;
import java.util.LinkedList;
import java.util.Queue;
import java.util.Scanner;

public class BFS_kundu_List {
	public static Member head;

	// public static Object m;
	public static void main(String[] args) {
		try {
			Work w = null;
			File f = new File("input.txt");
			// File f = new File("input.txt");
			Scanner k = new Scanner(f);
			while (k.hasNext()) {
				// int m = k.nextInt();
				// int n = k.nextInt();
				while (k.hasNext()) {
					// m = k.nextInt();
					// n = k.nextInt();

					Object m = k.next();
					// len=(int) m;
					Object n = k.next();
					w = new Work(m, n);
				}
			}
			// w.print();
			BFS_K_L b = new BFS_K_L(3, head);
			b.trav();

		} catch (Exception e) {
			System.out.println("There might be some problem " + e);
		}
	}

	public static class Work {
		public static Member tail;

		public Work(Object e, Object v) {
			if (head == null) {
				Member family = new Member(e, null, null);
				head = family;
				tail = family;
				Member neighbour = new Member(v, null);
				family.neighbour = neighbour;
				if (check(v, e)) {

				} else {
					Member family1 = new Member(v, null, null);
					tail.next = family1;
					tail = family1;
					Member neighbour1 = new Member(e, null);
					family1.neighbour = neighbour1;
				}
			} else {
				if (check(e, v)) {

				} else {
					Member family = new Member(e, null, null);
					tail.next = family;
					tail = family;
					Member neighbour = new Member(v, null);
					family.neighbour = neighbour;
				}
				if (check(v, e)) {

				} else {
					Member family1 = new Member(v, null, null);
					tail.next = family1;
					tail = family1;
					Member neighbour1 = new Member(e, null);
					family1.neighbour = neighbour1;
				}
			}
		}

		public boolean check(Object e, Object v) {
			for (Member m = head; m != null; m = m.next) {
				if (m.value.equals(e)) {
					for (Member n = m; n != null; n = n.neighbour)
						if (n.neighbour == null) {
							Member m1 = new Member(v, null);
							n.neighbour = m1;
							return true;
						}
				}
			}
			return false;
		}

		public void print() {
			int count = 0;
			for (Member m = head; m != null; m = m.next) {
				for (Member n = m; n != null; n = n.neighbour) {
					System.out.print(n.value);
					if (n.neighbour != null)
						System.out.print(" => ");
				}
				System.out.println();
				count++;
			}
			System.out.println();
			System.out.println("Total members : " + count);
		}

	}

	public static class Member {
		Object value;
		Member next;
		Member neighbour;

		public Member(Object value, Member next, Member neighbour) {
			this.value = value;
			this.next = next;
			this.neighbour = neighbour;
		}

		public Member(Object value, Member neighbour) {
			this.value = value;
			this.neighbour = neighbour;
		}

	}

	public static class BFS_K_L {
		Queue<Integer> q = new LinkedList<Integer>();
		public int visited[];
		public Member head;

		public BFS_K_L(int source, Member h) {
			q.add(source);

			this.head = h;
			visited = new int[len()];
		}

		public void trav() {

			Member get;
			System.out.print(q.peek());
			while (!q.isEmpty()) {
				visited[q.peek()] = 1;
				get = getVertex(q.poll());
				// System.out.println("Pk "+get.value);
				// System.out.println(get.value);
				for (Member m = get; m != null; m = m.neighbour) {
					if (visited[Integer.parseInt((String) m.value)] == 0) {
						System.out.print(" => " + m.value);
						q.add(Integer.parseInt((String) m.value));
						visited[Integer.parseInt((String) m.value)] = 1;

					}
				}
				// for(Integer s : q) {
				// System.out.println("i am n q "+s.toString());
				// }
			}
		}

		public int len() {
			int l = 0;
			for (Member m = head; m != null; m = m.next) {
				l++;
			}
			// System.out.println(l);
			return l;
		}

		public Member getVertex(Object source) {
			Object i = source;
			// System.out.println("sou "+source);
			Member m;
			for (m = head; m != null; m = m.next) {
				// System.out.println("m "+m.value+" "+i);
				int blo = Integer.parseInt((String) m.value);
				if (i == (Object) blo) {
					// System.out.println("val "+blo);
					break;
					// return m;/
				}
			}
			return m;

		}
	}

}
